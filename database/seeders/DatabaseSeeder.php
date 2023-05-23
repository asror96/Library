<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $genres= Genre::factory(100)->create();
        User::factory(20)->create();
        $books=Book::factory(100)->create();
        foreach ($books as $book){
            $genreIds=$genres->random(3)->pluck('id');
            $book->genres()->attach($genreIds);
        }
    }
}
