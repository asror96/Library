<?php

namespace App\Http\Resources\API;

use App\Models\Book_Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "count_book"=>count(Book_Genre::where('genre_id',$this->id)->get())
        ];
    }
}
