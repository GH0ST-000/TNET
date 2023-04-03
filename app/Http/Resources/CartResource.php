<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'product_id'=>$this->product_id,
            'quantity' => $this->quantity,
            'price'=>$this->price
        ];
    }
}
