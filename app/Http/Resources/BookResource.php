<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            "bookNumber" => $this->id,
            "name" => $this->name,
            "description" => $this->desc,
            "img" => "http://127.0.0.1:8000/uploads/$this->img",
            "category_id" => $this->category_id,
            // "category" => Category::findOrFail($this->category_id)->name,
            //'category' => CategoryResource::collection(Category::all()),
           'category' => new CategoryResource(Category::findOrFail($this->category_id)),



        ];
    }
}
