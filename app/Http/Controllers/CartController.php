<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\RemoveProductFromCartRequest;
use App\Http\Requests\UpdateProductInCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class CartController extends Controller
{
    public function Add(ProductRequest $request){

        $product = Product::Where('product_id',$request['product_id'])->first(['user_id','product_id']);

        $cart = Cart::create($product->toArray());

        return responder()->success($cart);

    }

    public function Remove(RemoveProductFromCartRequest $request){

        Cart::Where('product_id',$request['product_id'])->delete();

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
        $cart = Cart::Where('user_id','1')->get();
        return CartResource::collection($cart);
    }

}
