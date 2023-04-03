<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUserCart($user_id)
    {
        $cartItems = Cart::where('carts.user_id', $user_id)
            ->join('products', 'carts.product_id', '=', 'products.product_id')
            ->select('products.product_id', 'carts.quantity', 'products.price')
            ->get();
        $discount = 0;
        $userGroups = UserProductGroup::where('user_id', $user_id)->pluck('group_id')->toArray();
        foreach ($userGroups as $groupId) {
            $groupItems = ProductGroupItems::where('group_id', $groupId)->pluck('product_id')->toArray();
            $cartItemsInGroup = $cartItems->whereIn('product_id', $groupItems);
            if ($cartItemsInGroup->count() == count($groupItems)) {
                $discountPercentage = UserProductGroup::where('user_id', $user_id)->where('group_id', $groupId)->value('discount');
                $discountAmount = 0;
                foreach ($cartItemsInGroup as $cartItem) {
                    $discountAmount += min($cartItem->quantity, $cartItemsInGroup->where('product_id', $cartItem->product_id)->min('quantity')) * $cartItem->price * $discountPercentage / 100;
                }
                $discount += $discountAmount;
            }
        }

        return response()->json([
            'products' => $cartItems,
            'discount' => $discount,
        ]);
    }




}
