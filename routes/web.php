<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Log;

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/article/{slug?}', function ($slug=null) {
    $article = Article::where(['slug' => $slug])->firstOrFail();
    return view('web.article.index', ['article' => $article]);

});

Route::get('/test', function () {
    dump(request()->user());
    return "Test";
})->middleware(['auth']);


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('pagenotfound', [HomeController::class, 'pagenotfound'])->name('pagenotfound');
