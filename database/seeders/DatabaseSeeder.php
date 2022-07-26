<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'john doe',
            'email' => 'john@gmail.com'
        ]);
        
        Listing::factory()->create([
            'user_id' => $user->id,
            'title' => 'Laravel Senior Developer', 
            'tags' => 'laravel, javascript, vuejs',
            'company' => 'Acme Corp',
            'location' => 'Boston, MA',
            'email' => 'email1@email.com',
            'website' => 'https://www.acme.com',
        ]);

        Listing::factory()->create([
            'user_id' => $user->id,
            'title' => 'Full-Stack Engineer',
            'tags' => 'laravel, backend, api',
            'company' => 'Stark Industries',
            'location' => 'New York, NY',
            'email' => 'email2@email.com',
            'website' => 'https://www.starkindustries.com',
        ]);

        Listing::factory(10)->create([
            'user_id' => $user->id,
        ]);

        
        
    }
}
