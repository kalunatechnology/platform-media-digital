<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
    public function checkAndUpdateArticles()
    {
        Articles::where('status', 2)
            ->where('date_end', '<=', Carbon::now())
            ->update(['status' => 4]);
    }
    public function __construct()
    {
        $this->checkAndUpdateArticles();
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;

        $card = [
            'username' => $username,
            
        ];
        
        return view('Dashboard.pages.index', ['card' => $card]);
    }

    public function kategori()
    {
        $username = FacadesSession::get('username');
        $get_data = Categories::select('*')->paginate(10);


        $card = [
            'username' => $username,
            'get_data' => $get_data
        ];

        return view('Dashboard.pages.kategori', ['card' => $card]);
    }
    public function addkategori()
    {
        $username = FacadesSession::get('username');


        $card = [
            'username' => $username,
        ];

        return view('Dashboard.pages.kategori.add', ['card' => $card]);
    }
    public function postkategori(Request $request)
    {
        $username = FacadesSession::get('username');
    
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);
    
        // Buat kategori baru
        $kategori = new Categories();
        $kategori->name = $data['name'];
        $kategori->slug = Str::slug($data['name'], '-');
        $kategori->save();
    
        
        session()->flash('success', 'Data berhasil disimpan.');
    
        $card = [
            'username' => $username,
        ];
    
        return view('Dashboard.pages.kategori.add', ['card' => $card]);
    }
    public function editkategori ($id)
    {
        $data = Categories::find($id);
        $username = FacadesSession::get('username');


        $card = [
            'username' => $username
        ];

        return view('Dashboard.pages.kategori.edit', ['data' => $data, 'card' => $card]);
    }
    public function updatekategori($id, Request $request)
    {
        $kategori = Categories::findOrFail($id);
    
       
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $id,
        ]);
    
       
        $kategori->name = $data['name'];
        $kategori->slug = Str::slug($data['name'], '-');
        $kategori->save();
    
      
        session()->flash('success', 'Kategori berhasil diperbarui.');
    
        return redirect()->route('kategori');
    }
    public function destroykategori($id)
    {
        $data = Categories::find($id);
        $data->delete();
        return redirect()->route('kategori');
    }

    public function usersetting(Request $request)
    {
        $keyword = $request->keyword;

        $username = FacadesSession::get('username');
        $get_data = User::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('email', 'LIKE', '%'.$keyword.'%')->paginate(10);


        $card = [
            'username' => $username,
            'get_data' => $get_data,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.usersetting', ['card' => $card]);
    }
    public function adduser()
    {
        $username = FacadesSession::get('username');
        $roles = Roles::all();


        $card = [
            'username' => $username,
            'roles' => $roles
        ];

        return view('Dashboard.pages.user.add', ['card' => $card]);
    }
    public function postuser(Request $request)
    {
        $username = FacadesSession::get('username');

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'role_id' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $hashedPassword = Hash::make($data['password']);
    
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->password = $hashedPassword;
        $user->save();
    
        session()->flash('success', 'Data berhasil disimpan.');
    
        $roles = Roles::all();
    
        $card = [
            'roles' => $roles,
            'username' => $username,

        ];
    
        return view('Dashboard.pages.user.add', ['card' => $card]);
    }
    public function destroyuser ($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('usersetting');
    }
    public function edituser ($id)
    {
        $data = User::find($id);
        $username = FacadesSession::get('username');

        

        $roles = Roles::all();

        $card = [
            'roles' => $roles,
            'username' => $username
        ];

        return view('Dashboard.pages.user.edit', ['data' => $data, 'card' => $card]);
    }
    public function updateuser($id, Request $request)
    {
        $user = User::find($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
    
        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
    
        // Update status konfirmasi
        $user->is_approved = $request->input('is_approved');
    
        $user->save();
        
        return redirect()->route('usersetting')->with('success', 'Data user berhasil diperbarui.');
    }
    

    public function role()
    {
        $username = FacadesSession::get('username');
        $get_data = Roles::select('*')->paginate(10);


        $card = [
            'username' => $username,
            'get_data' => $get_data
        ];

        return view('Dashboard.pages.role', ['card' => $card]);
    }
    public function addrole()
    {
        $username = FacadesSession::get('username');


        $card = [
            'username' => $username,
        ];

        return view('Dashboard.pages.role.add', ['card' => $card]);
    }
    public function postrole(Request $request)
    {
        $username = FacadesSession::get('username');

        $data = $request->validate([
            'name' => 'required|string',
        ]);
    
    
        $role = new Roles();
        $role->name = $data['name'];
        $role->save();
    
        session()->flash('success', 'Data berhasil disimpan.');
    
    
        $card = [
            'username' => $username,

        ];
    
        return view('Dashboard.pages.role.add', ['card' => $card]);
    }
    public function editrole ($id)
    {
        $data = Roles::find($id);
        $username = FacadesSession::get('username');


        $card = [
            'username' => $username
        ];

        return view('Dashboard.pages.role.edit', ['data' => $data, 'card' => $card]);
    }
    public function updaterole($id, Request $request)
    {
        $role = Roles::find($id);
    
        $role->name = $request->input('name');
    
        $role->save();
    
        return redirect()->route('role');
    }
    public function destroyrole($id)
    {
        $data = Roles::find($id);
        $data->delete();
        return redirect()->route('role');
    }
    public function artikeladmin(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 0)->limit(3)->get();
        $get_data_published = Articles::where('status', 2)->limit(3)->get();
        $get_data_editor_check = Articles::where('status', 1)->limit(3)->get();
        $get_data_archived = Articles::where('status', 3)->limit(3)->get();
        $get_data_hidden = Articles::where('status', 4)->limit(3)->get();

        $count_draft = Articles::where('status', 0)->count();
        $count_published = Articles::where('status', 2)->count();
        $count_editor_check = Articles::where('status', 1)->count();
        $count_archived = Articles::where('status', 3)->count();
        $count_hidden = Articles::where('status', 4)->count();



        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'data_published' => $get_data_published,
            'data_editor_check' => $get_data_editor_check,
            'data_archived' => $get_data_archived,
            'data_hidden' => $get_data_hidden,
            'jumlah_draft' => $count_draft,
            'jumlah_published' => $count_published,
            'jumlah_editor_check' => $count_editor_check,
            'jumlah_archived' => $count_archived,
            'jumlah_hidden' => $count_hidden,
            
        ];
        
        return view('Dashboard.pages.artikeladmin', ['card' => $card]);
    }
    public function draft_articles_admin(Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 0)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 0)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];
        
        return view('Dashboard.pages.draft_articles_admin', ['card' => $card]);
    }
    public function preview_draft_admin ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.artikel.preview_admin', ['data' => $data, 'card' => $card]);
    }
    public function editor_check_admin (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 1)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 1)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.editor_check.editor_check_admin', ['card' => $card]);
    }
    public function preview_editor_check ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.editor_check.preview_editor_check', ['data' => $data, 'card' => $card]);
    }
    public function published_admin (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 2)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 2)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.publish.published_admin', ['card' => $card]);
    }
    public function perpanjangArtikel(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Articles::findOrFail($id);

        // Update data artikel
        $artikel->update([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 2,
        ]);

        
        return redirect()->back()->with('success', 'Artikel berhasil diperpanjang!');
    }
    public function arsipkanAdmin($id)
    {
        $artikel = Articles::findOrFail($id);
        $artikel->status = 3;
        $artikel->save();

        return redirect()->back()->with('success', 'Artikel berhasil diarsipkan.');
    }
    public function hidden_admin (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 4)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 4)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.hidden.hidden_admin', ['card' => $card]);
    }
    public function preview_hidden_admin ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.hidden.preview_hidden_admin', ['data' => $data, 'card' => $card]);
    }
    public function perpanjang_hiddenArtikel(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Articles::findOrFail($id);

        // Update data artikel
        $artikel->update([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 2,
        ]);

        
        return redirect()->back()->with('success', 'Artikel berhasil diperpanjang!');
    }
    public function hapus_hidden_admin ($id)
    {
        $data = Articles::find($id);
        $data->delete();
        return redirect()->route('hidden_admin');
    }


    
    public function edit_editor_check ($id)
    {
        $data = Articles::find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.editor_check.edit_editor_check', ['data' => $data, 'card' => $card]);
    }
    public function updateeditorcheck($id, Request $request)
    {
        $artikel = Articles::findOrFail($id);
    
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required|unique:articles,title,' . $id,
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'time' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $artikel->update([
            'category_id' => $request->kategori_id,
            'user_id' => $request->author ?? $artikel->user_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->deskripsi_singkat,
            'time' => $request->time,
            'content' => $request->content,
            'status' => 1,
        ]);
    
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete('public/' . $artikel->thumbnail);
            }
    
            $filePath = $request->file('thumbnail')->store('thumbnail', 'public');
    
            $artikel->update(['thumbnail' => $filePath]);
        }
    
        session()->flash('success', 'Artikel berhasil diperbarui.');
    
        return redirect()->route('editor_check_editor');
    }
    public function published_editor (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 2)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 2)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.publish.published_editor', ['card' => $card]);
    }
    public function edit_publish ($id)
    {
        $data = Articles::find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.publish.edit_publish', ['data' => $data, 'card' => $card]);
    }
    public function update_publish($id, Request $request)
    {
        $artikel = Articles::findOrFail($id);
    
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required|unique:articles,title,' . $id,
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'time' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    

    
        $artikel->update([
            'category_id' => $request->kategori_id,
            'user_id' => $request->author ?? $artikel->user_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->deskripsi_singkat,
            'time' => $request->time,
            'content' => $request->content,
            'status' => 2,
        ]);
    
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete('public/' . $artikel->thumbnail);
            }
    
            $filePath = $request->file('thumbnail')->store('thumbnail', 'public');
    
            $artikel->update(['thumbnail' => $filePath]);
        }
    
        session()->flash('success', 'Artikel berhasil diperbarui.');
    
        return redirect()->route('published_editor');
    }
    public function hidden_editor (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 4)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 4)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.hidden.hidden_editor', ['card' => $card]);
    }
    public function preview_hidden_editor ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.hidden.preview_hidden_editor', ['data' => $data, 'card' => $card]);
    }
    public function edit_hidden_artikel ($id)
    {
        $data = Articles::find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.hidden.edit_hidden_artikel', ['data' => $data, 'card' => $card]);
    }
    public function updatehidden($id, Request $request)
    {
        $artikel = Articles::findOrFail($id);
    
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required|unique:articles,title,' . $id,
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'time' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $artikel->update([
            'category_id' => $request->kategori_id,
            'user_id' => $request->author ?? $artikel->user_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->deskripsi_singkat,
            'time' => $request->time,
            'content' => $request->content,
            'status' => 4,
        ]);
    
        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete('public/' . $artikel->thumbnail);
            }
            
            $filePath = $request->file('thumbnail')->store('thumbnail', 'public');
            $artikel->update(['thumbnail' => $filePath]);
        }
    
        session()->flash('success', 'Artikel berhasil diperbarui.');
        return redirect()->route('hidden_editor');
    }
    


    public function publishArtikel(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Articles::findOrFail($id);

        // Update data artikel
        $artikel->update([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 2,
        ]);

        
        return redirect()->back()->with('success', 'Artikel berhasil dipublish!');
    }
    public function publishArtikel2(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Articles::findOrFail($id);

        // Update data artikel
        $artikel->update([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 2,
        ]);

        
        return redirect()->route('editor_check_admin')->with('success', 'Artikel berhasil dipublish!');

    }




    public function artikeleditor(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 0)->limit(3)->get();
        $get_data_published = Articles::where('status', 2)->limit(3)->get();
        $get_data_editor_check = Articles::where('status', 1)->limit(3)->get();
        $get_data_archived = Articles::where('status', 3)->limit(3)->get();
        $get_data_hidden = Articles::where('status', 4)->limit(3)->get();


        $count_draft = Articles::where('status', 0)->count();
        $count_published = Articles::where('status', 2)->count();
        $count_editor_check = Articles::where('status', 1)->count();
        $count_archived = Articles::where('status', 3)->count();
        $count_hidden = Articles::where('status', 4)->count();



        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'data_published' => $get_data_published,
            'data_editor_check' => $get_data_editor_check,
            'data_archived' => $get_data_archived,
            'data_hidden' => $get_data_hidden,
            'jumlah_draft' => $count_draft,
            'jumlah_published' => $count_published,
            'jumlah_editor_check' => $count_editor_check,
            'jumlah_archived' => $count_archived,
            'jumlah_hidden' => $count_hidden,
        ];
        
        return view('Dashboard.pages.artikeleditor', ['card' => $card]);
    }
    public function draft_articles_editor(Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 0)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('user', function ($query) use ($keyword) {
                      $query->where('name', 'LIKE', '%' . $keyword . '%');
                  });
        })
        ->paginate(15);
    

        $count_draft = Articles::where('status', 0)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];
        
        return view('Dashboard.pages.draft_articles_editor', ['card' => $card]);
    }
    public function preview_draft_editor ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.artikel.preview_editor', ['data' => $data, 'card' => $card]);
    }
    public function edit_editor ($id)
    {
        $data = Articles::find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.artikel.edit_editor', ['data' => $data, 'card' => $card]);
    }
    public function updateeditor($id, Request $request)
    {
        $artikel = Articles::findOrFail($id);
    
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required|unique:articles,title,' . $id,
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'time' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $artikel->update([
            'category_id' => $request->kategori_id,
            'user_id' => $request->author ?? $artikel->user_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->deskripsi_singkat,
            'time' => $request->time,
            'content' => $request->content,
            'status' => 1,
        ]);
    
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete('public/' . $artikel->thumbnail);
            }
    
            $filePath = $request->file('thumbnail')->store('thumbnail', 'public');
    
            $artikel->update(['thumbnail' => $filePath]);
        }
    
        session()->flash('success', 'Artikel berhasil diperbarui.');
    
        return redirect()->route('draft_articles_editor');
    }
    public function editor_check_editor(Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('status', 1)
        ->where('title', 'LIKE', '%'.$keyword.'%')
        ->paginate(10);
    

        $count_draft = Articles::where('status', 1)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];
        
        return view('Dashboard.pages.editor_check.editor_check_editor', ['card' => $card]);
    }
    public function preview_editor_check_admin ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.editor_check.preview_editor_check_admin', ['data' => $data, 'card' => $card]);
    }


    public function profile(Request $request, $id)
    {
        // Ambil data user berdasarkan ID
        $data = User::findOrFail($id);
        $username = FacadesSession::get('username');
    
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $asal_daerah = [
            'provinsi' => $provinsi,
            'kota' => $kota,
        ];
    
        if ($request->isMethod('post')) {
    
            // Update data user
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->telepon = $request->input('telepon');
            $data->role_id = $request->input('role_id');
            $data->provinces_id = $request->input('provinsi');
            $data->regencies_id = $request->input('kota');
            $data->districts_id = $request->input('kecamatan');
            $data->villages_id = $request->input('kelurahan');
    
            if ($request->filled('password')) {
                $data->password = Hash::make($request->input('password'));
            } else {
                $data->password = $data->getOriginal('password');
            }
            
    
            if ($request->hasFile('photos')) {
                $file = $request->file('photos');
            
                if ($file->getSize() > 2 * 1024 * 1024) {
                    return redirect()->back()->with('error', 'Ukuran file terlalu besar! Maksimal 2MB.');
                }
            
                if ($data->photos) {
                    Storage::delete('public/' . $data->photos);
                }
            
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/foto_profil', $filename);
            
                $data->photos = str_replace('public/', '', $path);
            }
    
            $data->save();
    
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        }
    
        $card = [
            'username' => $username,
        ];
        $asal_daerah = [
            'provinsi' => $provinsi,
            'kota' => $kota,
        ];
    
        return view('Dashboard.pages.profile', ['data' => $data, 'card' => $card, 'asal' => $asal_daerah]);
    }

    public function artikel(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('user_id', $user->id)->where('status', 0)->limit(3)->get();
        $get_data_published = Articles::where('user_id', $user->id)->where('status', 2)->limit(3)->get();
        $get_data_editor_check = Articles::where('user_id', $user->id)->where('status', 1)->limit(3)->get();
        $get_data_archived = Articles::where('user_id', $user->id)->where('status', 3)->limit(3)->get();
        $get_data_hidden = Articles::where('user_id', $user->id)->where('status', 4)->limit(3)->get();

        $count_draft = Articles::where('user_id', $user->id)->where('status', 0)->count();
        $count_published = Articles::where('user_id', $user->id)->where('status', 2)->count();
        $count_editor_check = Articles::where('user_id', $user->id)->where('status', 1)->count();
        $count_archived = Articles::where('user_id', $user->id)->where('status', 3)->count();
        $count_hidden = Articles::where('user_id', $user->id)->where('status', 4)->count();



        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'data_published' => $get_data_published,
            'data_editor_check' => $get_data_editor_check,
            'data_archived' => $get_data_archived,
            'data_hidden' => $get_data_hidden,
            'jumlah_draft' => $count_draft,
            'jumlah_published' => $count_published,
            'jumlah_editor_check' => $count_editor_check,
            'jumlah_archived' => $count_archived,
            'jumlah_hidden' => $count_hidden,
            
        ];
        
        return view('Dashboard.pages.artikel', ['card' => $card]);
    }
    public function addartikel()
    {
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();


        $card = [
            'username' => $username,
            'kategori' => $kategori
        ];

        return view('Dashboard.pages.artikel.add', ['card' => $card]);
    }
    public function postartikel(Request $request)
    {
        $username = FacadesSession::get('username');
        $kategori = Categories::all();
    
        $validated = $request->validate([
            'kategori_id' => 'required|exists:categories,id',
            'title' => 'required|unique:articles,title',
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $thumbnailPath = $this->uploadThumbnail($request);
    
        DB::beginTransaction();
        try {
            $article = new Articles();
            $article->fill([
                'category_id' => $validated['kategori_id'],
                'user_id' => Auth::id(),
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'short_description' => $validated['deskripsi_singkat'],
                'content' => $validated['content'],
                'thumbnail' => $thumbnailPath,
                'status' => 0,
            ]);
            $article->save();
    
            DB::commit();
            return redirect()->back()->with([
                'success' => 'Artikel berhasil disimpan sebagai draft. Tunggu editor menghubungi anda',
                'card' => compact('username', 'kategori'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan dalam menyimpan data.']);
        }
    }
    
    private function uploadThumbnail($request)
    {
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/thumbnail', $fileName);
            return str_replace('public/', '', $path);
        }
        return null;
    }
    
    
    public function edit_draft_artikel ($id)
    {
        $data = Articles::find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.artikel.edit', ['data' => $data, 'card' => $card]);
    }
    public function updateartikel($id, Request $request)
    {
        $artikel = Articles::findOrFail($id);
    
        $request->validate([
            'kategori_id' => 'required',
            'author' => 'required',
            'title' => 'required|unique:articles,title,' . $id,
            'deskripsi_singkat' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $artikel->update([
            'category_id' => $request->kategori_id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_description' => $request->deskripsi_singkat,
            'content' => $request->content,
            'status' => 0,
        ]);
    
        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail) {
                Storage::delete('public/' . $artikel->thumbnail);
            }
    
            $filePath = $request->file('thumbnail')->store('thumbnail', 'public');
    
            $artikel->update(['thumbnail' => $filePath]);
        }
    
        session()->flash('success', 'Artikel berhasil diperbarui.');
    
        return redirect()->route('draft_articles');
    }
    public function destroyartikel ($id)
    {
        $data = Articles::find($id);
        $data->delete();
        return redirect()->route('draft_articles');
    }
    
    public function draft_articles(Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('user_id', $user->id)
        ->where('status', 0)
        ->where('title', 'LIKE', '%'.$keyword.'%')
        ->paginate(10);
    

        $count_draft = Articles::where('user_id', $user->id)->where('status', 0)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];
        
        return view('Dashboard.pages.draft_articles', ['card' => $card]);
    }
    public function preview_draft ($id)
    {
        $data = Articles::with('user')->find($id);
        $username = FacadesSession::get('username');
        $kategori = Categories::select('*')->get();



        $card = [
            'username' => $username,
            'kategori' => $kategori

        ];

        return view('Dashboard.pages.artikel.preview', ['data' => $data, 'card' => $card]);
    }
    public function editor_check(Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('user_id', $user->id)
        ->where('status', 1)
        ->where('title', 'LIKE', '%'.$keyword.'%')
        ->paginate(10);
    

        $count_draft = Articles::where('user_id', $user->id)->where('status', 1)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];
        
        return view('Dashboard.pages.editor_check.editor_check', ['card' => $card]);
    }
    public function published (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('user_id', $user->id)
        ->where('status', 2)
        ->where('title', 'LIKE', '%'.$keyword.'%')
        ->paginate(10);
    

        $count_draft =  Articles::where('user_id', $user->id)->where('status', 2)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.publish.published', ['card' => $card]);
    }
    public function hidden_artikel (Request $request)
    {
        $keyword = $request->keyword;

        $user = Auth::user();
        $username = $user->name;
        $get_data_draft = Articles::where('user_id', $user->id)
        ->where('status', 4)
        ->where('title', 'LIKE', '%'.$keyword.'%')
        ->paginate(10);
    

        $count_draft =  Articles::where('user_id', $user->id)->where('status', 4)->count();


        $card = [
            'username' => $username,
            'data_draft' => $get_data_draft,
            'jumlah_draft' => $count_draft,
            'keyword' => $keyword
        ];

        return view('Dashboard.pages.hidden.hidden', ['card' => $card]);
    }



    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => 1]); // Ubah status jadi 1 (Approved)

        return redirect()->back()->with('success', 'User telah di-approve.');
    }

    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => 2]); // Ubah status jadi 2 (Ditolak)

        return redirect()->back()->with('error', 'User telah ditolak.');
    }

}
