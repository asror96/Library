<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Genre extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'book_genre';
    protected $guarded =false;
}
