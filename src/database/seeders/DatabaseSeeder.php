<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 3; $i++) {
            $user = User::factory()->create([
                'name' => 'Test'.$i,
                'email' => 'test'.$i.'@example.com',
            ]);

            Post::factory(5)->create([
                'user_id' => $user->id,
            ]);
        }

    }
}
