<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\RemoveProductFromCartRequest;
use App\Http\Requests\UpdateProductInCartRequest;
use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function Add(ProductRequest $request){

        $product = Product::Where('product_id',$request['product_id'])->first(['user_id','product_id']);
        $data = Cart::Where('product_id',$request['product_id'])->first();
        if (isset($data)){
           Cart::Where('product_id',$request['product_id'])->update(['quantity'=>(int)$data->quantity +1]);
            return responder()->success();
        }else{
            $cart = Cart::create($product->toArray());
        }


        return responder()->success($cart);

    }

    public function Remove(RemoveProductFromCartRequest $request){

       $data = Cart::Where('product_id',$request['product_id'])->first();
        if ($data->quantity > 1){
            Cart::Where('product_id',$request['product_id'])->update(['quantity'=>(int)$data->quantity -1]);
        }else{
            Cart::Where('product_id',$request['product_id'])->delete();
        }
        return response()->noContent();

    }

    public function Update(UpdateProductInCartRequest $request){
        if ($request['quantity'] >0){
            Cart::Where('product_id',$request['product_id'])->update(['quantity'=>$request['quantity']]);
            return responder()->success();
        }else{
            return  responder()->error('400','Quantity Must Be More Than 0');
        }

    }

    public function Get(){
        /**
         * ჰარდკოდირებულია აიდი რადგან არ გვაქვს auth ობიექტან წვდომა,
           გამომდინარე იქედან, რომ არ გვაქვს რეგისტრაცია ავტორიზაცია
         */

        $cart = new Cart();
        return $cart->getUserCart('1');

    }

}
