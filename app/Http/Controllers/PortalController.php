<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\ArticleViews;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PortalController extends Controller
{
    public function checkAndUpdateArticles()
    {
        $now = Carbon::now();
    
        // Update artikel dengan status 2 menjadi 4 dan reset editor_pick jika perlu
        $updatedStatus2 = Articles::where('status', 2)
            ->where('date_end', '<=', $now)
            ->update([
                'status' => 4,
                'editor_pick' => 0 // Reset editor_pick
            ]);
    
        // Update artikel dengan status 3 menjadi 4 dan reset editor_pick jika perlu
        $updatedStatus3 = Articles::where('status', 3)
            ->where('date_end', '<=', $now)
            ->update([
                'status' => 4,
                'editor_pick' => 0 // Reset editor_pick
            ]);
    
        // Reset editor_pick ke 0 jika status == 3 (hanya status 2 yang boleh editor_pick = 1)
        $resetEditorPick = Articles::where('status', 3)
            ->where('editor_pick', 1)
            ->update(['editor_pick' => 0]);
    
        // Hitung total perubahan
        $totalUpdated = $updatedStatus2 + $updatedStatus3 + $resetEditorPick;
    
        // Logging atau response JSON
        if ($totalUpdated > 0) {
            Log::info("$totalUpdated artikel telah diperbarui. Status 4 dan editor_pick disesuaikan.");
        } else {
            Log::info("Tidak ada perubahan artikel.");
        }
    }
    public function __construct()
    {
        $this->checkAndUpdateArticles();
    }
    
    public function index ()
    {

        return view("Portal.pages.index");
    }
    public function detailberita($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();
    
        $comments = Comments::where('article_id', $article->id)
            ->orderByDesc('id')
            ->get()
            ->map(function ($comment) {
                return [
                    'username' => $comment->username,
                    'comment' => $comment->comment,
                    'time_ago' => Carbon::parse($comment->created_at)
                        ->timezone('Asia/Jakarta')
                        ->diffForHumans(),
                    'timestamp' => Carbon::parse($comment->created_at)
                        ->timezone('Asia/Jakarta')
                        ->timestamp 
                ];
            });
    
        return view("Portal.pages.detailberita", compact('article', 'comments', 'slug'));
    }
    

    public function author ()
    {

        return view("Portal.pages.author");
    }
    public function getAuthors(Request $request)
    {
        $query = User::where('role_id', 4);
    
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        $authors = $query->paginate(10);
    
        return response()->json($authors);
    }
    public function authorPage($name)
    {
        // Cari user berdasarkan name
        $user = User::where('name', $name)->firstOrFail();
    
        // Kirim user ke view (kita butuh id untuk AJAX nanti)
        return view('Portal.pages.author_articles', compact('user'));
    }
    
    public function getAuthorArticles($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
    
        // Ambil artikel berdasarkan user_id
        $articles = $user->articles()->paginate(10);
    
        // Return dalam format JSON
        return response()->json($articles);
    }
    public function getCategories()
    {
        $categories = Categories::select('name', 'thumbnail_categories', 'slug')->get();
    
        $categories->transform(function ($category) {
            $category->thumbnail_categories = $category->thumbnail_categories 
                ? asset('storage/' . $category->thumbnail_categories) 
                : asset('images/hiburan.jpg'); // Gambar default
    
            return $category;
        });
    
        return response()->json($categories);
    }
    



    public function category ()
    {

        return view("Portal.pages.category");
    }
    public function categoryDetail($slug)
    {
        $category = Categories::where('slug', $slug)->firstOrFail();

        return view('Portal.pages.detailcategory', compact('category'));
    }
    public function getCategoryArticles($id)
    {
            // Ambil artikel dengan view terbanyak
            $mostViewedArticle = Articles::where('category_id', $id)
                ->with('user', 'category')
                ->orderByDesc('views_count')
                ->first();
        
            // Ambil artikel lainnya, kecuali yang sudah jadi "big article"
            $articlesQuery = Articles::where('category_id', $id)
                ->with('user', 'category')
                ->orderByDesc('created_at');
        
            if ($mostViewedArticle) {
                $articlesQuery->where('id', '!=', $mostViewedArticle->id);
            }
        
            $articles = $articlesQuery->paginate(10);
        
            return response()->json([
                'most_viewed' => $mostViewedArticle,
                'articles' => $articles
            ]);
        }
    public function getArticleBySlug($slug, Request $request)
    {
        // Ambil artikel berdasarkan slug (langsung semua data)
        $article = Articles::where('slug', $slug)
            ->with(['user', 'category'])
            ->firstOrFail(); // Jika tidak ditemukan, otomatis akan mengembalikan error 404
        if (!$article) {
            return response()->json(['error' => 'Artikel tidak ditemukan', 'slug' => $slug], 404);
        }
    
        // Catat views berdasarkan IP
        $ipAddress = $request->ip();
        $existingView = ArticleViews::where('article_id', $article->id)
            ->where('ip_address', $ipAddress)
            ->exists(); // Lebih cepat daripada first()
    
        if (!$existingView) {
            ArticleViews::create([
                'article_id' => $article->id,
                'ip_address' => $ipAddress,
            ]);
            $article->increment('views_count');
        }
    
        // Ambil data pembuat artikel
        $author = $article->user ? [
            'id' => $article->user->id,
            'name' => $article->user->name,
            'email' => $article->user->email,
            'description' => $article->user->description,
            'photos' => $article->user->photos 
                ? Storage::url($article->user->photos) 
                : asset('images/default-user.png'),
        ] : null;
    
        // Ambil semua kategori
        $categories = Categories::withCount('articles')->get();// Menggunakan all() karena akan mengambil semua data
    
        // Ambil artikel rekomendasi dari penulis yang sama
        $recommendedArticles = Articles::where('user_id', $article->user_id)
            ->with(['user', 'category'])
            ->where('id', '!=', $article->id)
            ->orderByDesc('views_count')
            ->limit(5)
            ->get(); // Ambil semua kolom
    
        // Ambil artikel terbaru berdasarkan `created_at`
        $latestArticles = Articles::orderByDesc('created_at')
            ->limit(5)
            ->get(); // Ambil semua kolom

        // **Ambil komentar berdasarkan `article_id`**
        $comments = Comments::where('article_id', $article->id)
        ->orderByDesc('id')
        ->get()
        ->map(function ($comment) {
            return [
                'username' => $comment->username,
                'comment' => $comment->comment,
                'time_ago' => Carbon::parse($comment->created_at)
                    ->timezone('Asia/Jakarta')
                    ->diffForHumans(),
                'timestamp' => Carbon::parse($comment->created_at)
                    ->timezone('Asia/Jakarta')
                    ->timestamp // Kirim dalam UNIX timestamp
            ];
        });

        // Hitung jumlah komentar
        $commentCount = Comments::where('article_id', $article->id)->count();
    
        // Return JSON Response
        return response()->json([
            'article' => $article,
            'author' => $author,
            'categories' => $categories,
            'recommended_articles' => $recommendedArticles,
            'latest_articles' => $latestArticles,
            'comments' => $comments,
            'comment_count' => $commentCount
        ]);
    }
    public function postComment(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'email' => 'required|email',
            'username' => 'nullable|string|max:255',
            'comment' => 'required|string',
        ]);
    
        // Simpan ke database
        $comment = Comments::create([
            'article_id' => $request->article_id,
            'username' => $request->username ?? 'Anonymous',
            'comment' => $request->comment,
            'email' => $request->email,
        ]);
    
        return response()->json([
            'username' => $comment->username,
            'comment' => $comment->comment,
            'email' => $comment->email,
            'time_ago' => Carbon::parse($comment->created_at)->timezone('Asia/Jakarta')->diffForHumans(),
            'timestamp' => Carbon::parse($comment->created_at)->timezone('Asia/Jakarta')->timestamp
        ]);
    }
    

        
        
    


    // public function detailcategory ()
    // {

    //     return view("Portal.pages.detailcategory");
    // }
}
