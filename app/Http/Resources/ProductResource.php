<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
       return [
            'id' => $this->id,
            'pro_name' => $this->pro_name,
            'pro_price' => $this->pro_price,
            'category'=>$this->category,
            'shelf_life'=>$this->shelf_life,
            'pro_description' => $this->pro_description,
            'pro_width'=>$this->pro_width,
            'pro_height'=>$this->pro_height,
            'pro_length'=>$this->pro_length,
            // 'pro_image_url' => $this->pro_image_url,
            'quantity' => $this->quantity,
            'orderItems' => OrderItemResource::collection($this->whenLoaded('orderItems')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

       ];
    }
}
