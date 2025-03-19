<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PortalController::class, 'index'])->name('home');
Route::get('/detailberita', [PortalController::class, 'detailberita'])->name('home');
Route::get('/author', [PortalController::class, 'author'])->name('home');
Route::get('/category', [PortalController::class, 'category'])->name('category');
Route::get('category/detailcategory', [PortalController::class, 'detailcategory'])->name('detailcategory');

Route::group(['prefix' => 'backoffice', 'middleware' => 'auth:web'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kategori', [DashboardController::class, 'kategori'])->name('kategori');
    Route::get('/addkategori', [DashboardController::class, 'addkategori']);
    Route::post('/addkategori', [DashboardController::class, 'postkategori']);
    Route::get('/{id}/editkategori', [DashboardController::class, 'editkategori']);
    Route::put('/kategori/{id}', [DashboardController::class, 'updatekategori']);
    Route::delete('/kategori/{id}', [DashboardController::class, 'destroykategori']);

    Route::get('/usersetting', [DashboardController::class, 'usersetting'])->name('usersetting');
    Route::get('/adduser', [DashboardController::class, 'adduser']);
    Route::post('/adduser', [DashboardController::class, 'postuser']);
    Route::get('/{id}/edituser', [DashboardController::class, 'edituser']);
    Route::put('/usersetting/{id}', [DashboardController::class, 'updateuser']);
    Route::delete('/usersetting/{id}', [DashboardController::class, 'destroyuser']);

    Route::get('/role', [DashboardController::class, 'role'])->name('role');
    Route::get('/addrole', [DashboardController::class, 'addrole']);
    Route::post('/addrole', [DashboardController::class, 'postrole']);
    Route::get('/{id}/editrole', [DashboardController::class, 'editrole']);
    Route::put('/role/{id}', [DashboardController::class, 'updaterole']);
    Route::delete('/role/{id}', [DashboardController::class, 'destroyrole']);

    // khusus admin
    Route::get('/artikeladmin', [DashboardController::class, 'artikeladmin'])->name('artikeladmin');
    Route::get('/draft_articles_admin', [DashboardController::class, 'draft_articles_admin'])->name('draft_articles_admin');
    Route::get('/preview_draft_admin/{id}', [DashboardController::class, 'preview_draft_admin'])->name('preview_draft_admin');
    Route::get('/editor_check_admin', [DashboardController::class, 'editor_check_admin'])->name('editor_check_admin');
    Route::put('/artikel/{id}/publish', [DashboardController::class, 'publishArtikel'])->name('artikel.publish');
    Route::put('/artikel2/{id}/publish', [DashboardController::class, 'publishArtikel2'])->name('artikel.publish2');
    Route::get('/preview_editor_check/{id}', [DashboardController::class, 'preview_editor_check'])->name('preview_editor_check');



    

    // khusus editor
    Route::get('/artikeleditor', [DashboardController::class, 'artikeleditor'])->name('artikeleditor');
    Route::get('/draft_articles_editor', [DashboardController::class, 'draft_articles_editor'])->name('draft_articles_editor');
    Route::get('/preview_draft_editor/{id}', [DashboardController::class, 'preview_draft_editor'])->name('preview_draft_editor');
    Route::get('/edit_editor/{id}', [DashboardController::class, 'edit_editor'])->name('edit_editor');
    Route::put('/editor/{id}', [DashboardController::class, 'updateeditor']);
    Route::get('/editor_check_editor', [DashboardController::class, 'editor_check_editor'])->name('editor_check_editor');
    Route::get('/preview_editor_check/{id}', [DashboardController::class, 'preview_editor_check'])->name('preview_editor_check');
    Route::get('/edit_editor_check/{id}', [DashboardController::class, 'edit_editor_check'])->name('edit_editor_check');
    Route::put('/editor_check/{id}', [DashboardController::class, 'updateeditorcheck']);



    // khusus author
    Route::get('/artikel', [DashboardController::class, 'artikel'])->name('artikel');
    Route::get('/addartikel', [DashboardController::class, 'addartikel']);
    Route::post('/addartikel', [DashboardController::class, 'postartikel']);    
    Route::get('/{id}/edit_draft_artikel', [DashboardController::class, 'edit_draft_artikel']);
    Route::put('/artikel/{id}', [DashboardController::class, 'updateartikel']);
    Route::delete('/artikel/{id}', [DashboardController::class, 'destroyartikel']);
    Route::get('/draft_articles', [DashboardController::class, 'draft_articles'])->name('draft_articles');
    Route::get('/preview_draft/{id}', [DashboardController::class, 'preview_draft'])->name('preview_draft');
    Route::get('/editor_check', [DashboardController::class, 'editor_check'])->name('editor_check');




    Route::get('/profile/{id}', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile/{id}', [DashboardController::class, 'profile']);





    Route::put('/approveuser/{id}', [DashboardController::class, 'approveUser'])->name('approve.user');
    Route::put('/rejectuser/{id}', [DashboardController::class, 'rejectUser'])->name('reject.user');

});
Route::prefix('api')->group(function () {
    Route::post('/getkota', [LoginController::class, 'getkota'])->name('getkota.fetch');
    Route::post('/getkecamatan', [LoginController::class, 'getkecamatan'])->name('getkecamatan.fetch');
    Route::post('/getkelurahan', [LoginController::class, 'getkelurahan'])->name('getkelurahan.fetch');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');