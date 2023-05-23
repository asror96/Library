<?php
namespace App\Services\Genre;
use App\Models\Genre;
class Service
{
    public function store($data){
        Genre::create($data);
    }
    public function update($data,Genre $genre){
        $genre->update($data);
    }
}
