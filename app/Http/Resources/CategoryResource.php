<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "categoryNumber" => $this->id,
            "name" => $this->name,
            "image" =>"http://127.0.0.1:8000/uploads/$this->img",
        ];
    }
}
