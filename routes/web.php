<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/index',[ShopController::class,'index'])->name('index');

Route::get('/products',[ShopController::class,'products'])->name('products');

Route::get('/productCreate',[ShopController::class,'productCreate'])->name('productCreate');

Route::post('/productStore',[ShopController::class,'productstore'])->name('productStore');

Route::get('/mycart',[ShopController::class,'myCart'])->name('mycart')->middleware('auth');

Route::post('/addmycart',[ShopController::class,'addMycart'])->name('addmycart'); 

Route::delete('/cartdelete',[ShopController::class,'deleteCart'])->name('cartdelete');

Route::post('/purchase',[ShopController::class,'purchase'])->name('purchase');
Route::get('purchase',[ShopController::class,'purchase'])->name('purchase');

Route::post('/purchaseComplete',[ShopController::class,'complete'])->name('complete');

Route::get('/purchaseComplete',[ShopController::class,'redirect_once'])->name('shop');

Route::get('/admin',[ShopController::class,'admin'])->name('admin')->middleware(['auth']);

Route::delete('/delete/{id}',[ShopController::class,'itemDelete'])->name('delete');

Route::get('/edit/{id}',[ShopController::class,'edit'])->name('edit');

Route::put('/update/{product}',[ShopController::class,'update'])->name('update');

Route::fallback(function () {
	return redirect('/index');
});

Route::post('/like', [ShopController::class,'like'])->name('products.like');

Route::get('/likeItems',[ShopController::class,'likeItems'])->name('likeItems');

Route::get('/product_detail/{id}',[ShopController::class,'detail'])->name('detail');

Route::post('/purchaseConfirm',[ShopController::class,'confirm'])->name('confirm');

Route::get('login/google', [AuthenticatedSessionController::class,'redirectToGoogle']);

Route::get('login/google/callback', [AuthenticatedSessionController::class,'handleGoogleCallback']);

Route::get('mypage',[ShopController::class,'mypage'])->name('mypage');

Route::get('/purchase/history',[ShopController::class,'history'])->name('history');

Route::get('/purchaseDetail/{order_id}',[ShopController::class,'purchaseDetail'])->name('purchaseDetail');

Route::post('/quantityChange', [ShopController::class,'quantityChange'])->name('quantityChange');

//コメント投稿処理
Route::post('/product/{comment_id}/comments',[ShopController::class,'comments']);

//コメント取消処理
Route::get('/product/{comment_id}', [ShopController::class,'destroyComment']);

Route::get('/csv-download', [ShopController::class, 'downloadCsv']);

Route::get('/user/update',[UserController::class,'update'])->name('updateUser');

Route::post('/user/complete',[UserController::class,'complete'])->name('updateComplete');

Route::get('/user/passchange',[UserController::class,'passChange'])->name('pass_change');

Route::post('/user/passComplete',[UserController::class,'passComplete'])->name('passChangeComplete');

Route::post('/withdrawal',[UserController::class,'withdrawal'])->name('withdrawal');

Route::get('/category/{id}',[ShopController::class,'categoryShow'])->name('category');


