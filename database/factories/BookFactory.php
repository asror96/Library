<?php

namespace Database\Factories;

use App\Enums\BookTypeEnum;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->name,
            'type'=>BookTypeEnum::randomValue(),
            'user_id'=>User::get()->random()->id
        ];
    }
}
