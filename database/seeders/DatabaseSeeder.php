<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            NoteSeeder::class
        ]);

        User::factory()->create([
            'name' => 'kirakira4141',
            'email' => 'kirakira4141@example.com',
            'password' => 'kirakira4141',
        ]);
    }
}
