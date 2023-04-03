<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::controller(CartController::class)->group(function () {
   Route::post('addProductInCart','Add')->name('addProductInCart');
   Route::post('removeProductFromCart','Remove')->name('removeProductFromCart');
   Route::post('setCartProductQuantity','Update')->name('setCartProductQuantity');
   Route::get('getUserCart','Get')->name('getUserCart');
});
