<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyBlogController;

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

// BEGIN: Route a Controllers
// POST
Route::post('/my_blog', [MyBlogController::class, 'append'
])->name('my_blog.append');

Route::post('/my_comment', [MyBlogController::class, 'appendcomment'
])->name('my_comment.append');

// DELETE
Route::delete('/my_blog/{id}', [MyBlogController::class, 'delete'])->name('my_blog.delete');

// GET BLOGS --- NB: RITORNA LA VIEW, QUINDI NON SERVE RICHIAMARE LA PAGINA TRAMITE LA ROUTE A VISTA!!!
Route::get('/listblogs', [MyBlogController::class, 'readall'
])->name('manageblogs');

// GET LOGS --- NB: RITORNA LA VIEW, QUINDI NON SERVE RICHIAMARE LA PAGINA TRAMITE LA ROUTE A VISTA!!!
Route::get('/listlogs', [MyBlogController::class, 'readlast50'
])->name('managelogs');

// GET COMMENTS --- NB: RITORNA LA VIEW, QUINDI NON SERVE RICHIAMARE LA PAGINA TRAMITE LA ROUTE A VISTA!!!
Route::get('/listcomments{id}', [MyBlogController::class, 'readallcomments'
])->name('managecomments');

Route::get('/readblog/{id}', [MyBlogController::class, 'readone'
])->name('selblog');

// Route per aggiornare un blog
Route::patch('/updateblog/{id}', [MyBlogController::class, 'update'
])->name('my_blog.change');

// END: Route a Controllers

// BEGIN: Route a Viste
Route::get('/', function () {
    return view('myblog');
})->name('landingpage');

//Route::get('/listblogs', function () {
//    return view('listblogs');
//})->name('manageblogs');

Route::get('/newblog', function () {
    return view('newblog');
})->name('newblog') ->middleware('auth');

Route::get('/denied', function () {
    return view('denied');
})->name('accessdenied');

// END: Route a Viste

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
