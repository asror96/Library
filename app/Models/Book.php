<?php

namespace App\Models;

use App\Enums\BookTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class,'book_genre','book_id','genre_id');
    }
    protected $casts=[
        'type'=>BookTypeEnum::class
    ];
}
