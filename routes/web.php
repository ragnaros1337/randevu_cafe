<?php

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
    Route::get('/admin', \App\Http\Controllers\Main\IndexController::class);
    Route::get('/', \App\Http\Controllers\IndexController::class);

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', App\Http\Controllers\Category\IndexController::class)->name('category.index');
        Route::get('/create', App\Http\Controllers\Category\CreateController::class)->name('category.create');
        Route::post('/', App\Http\Controllers\Category\StoreController::class)->name('category.store');
        Route::get('/{category}/edit', App\Http\Controllers\Category\EditController::class)->name('category.edit');
        Route::get('/{category}', App\Http\Controllers\Category\ShowController::class)->name('category.show');
        Route::patch('/{category}', App\Http\Controllers\Category\UpdateController::class)->name('category.update');
        Route::delete('/{category}', App\Http\Controllers\Category\DeleteController::class)->name('category.delete');
    });

    Route::group(['prefix' => 'goods'], function (){
        Route::get('/', App\Http\Controllers\Good\IndexController::class)->name('good.index');
        Route::get('/create', App\Http\Controllers\Good\CreateController::class)->name('good.create');
        Route::post('/', App\Http\Controllers\Good\StoreController::class)->name('good.store');
        Route::get('/{good}/edit', App\Http\Controllers\Good\EditController::class)->name('good.edit');
        Route::get('/{good}', App\Http\Controllers\Good\ShowController::class)->name('good.show');
        Route::patch('/{good}', App\Http\Controllers\Good\UpdateController::class)->name('good.update');
        Route::delete('/{good}', App\Http\Controllers\Good\DeleteController::class)->name('good.delete');
    });

    Route::group(['prefix' => 'orders'], function (){
        Route::get('/', App\Http\Controllers\Order\IndexController::class)->name('order.index');
        Route::get('/create', App\Http\Controllers\Order\CreateController::class)->name('order.create');
        Route::post('/', App\Http\Controllers\Order\StoreController::class)->name('order.store');
        Route::get('/{order}/edit', App\Http\Controllers\Order\EditController::class)->name('order.edit');
        Route::get('/{order}', App\Http\Controllers\Order\ShowController::class)->name('order.show');
        Route::patch('/{order}', App\Http\Controllers\Order\UpdateController::class)->name('order.update');
        Route::delete('/{order}', App\Http\Controllers\Order\DeleteController::class)->name('order.delete');
    });

    Route::group(['prefix' => 'mans'], function (){
        Route::get('/', App\Http\Controllers\Man\IndexController::class)->name('man.index');
        Route::get('/create', App\Http\Controllers\Man\CreateController::class)->name('man.create');
        Route::post('/', App\Http\Controllers\Man\StoreController::class)->name('man.store');
        Route::get('/{man}/edit', App\Http\Controllers\Man\EditController::class)->name('man.edit');
        Route::get('/{man}', App\Http\Controllers\Man\ShowController::class)->name('man.show');
        Route::patch('/{man}', App\Http\Controllers\Man\UpdateController::class)->name('man.update');
        Route::delete('/{man}', App\Http\Controllers\Man\DeleteController::class)->name('man.delete');
    });
});


Route::prefix('api')->group(function(){
    Route::post('/get_filtered_database', [App\Http\Controllers\IndexController::class, 'getFilteredDatabase'])->name('api.filter');
});
