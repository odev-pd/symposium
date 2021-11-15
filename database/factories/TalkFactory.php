<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TalkFactory extends Factory
{
    public function definition()
    {
        return [
            'author_id' => User::factory()->create(),
        ];
    }
}
