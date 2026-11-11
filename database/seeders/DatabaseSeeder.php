<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt(123),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123),
            'role' => 'admin'
        ]);

        Type::create([
            'name' => 'Standard',
            'harga' => 100000,
            'deskripsi' => 'kamar ini luas',
            'fasilitas' => 'AC,TV',
            'foto' => 'foto/standard.jpg',        
        ]);
         Type::create([
            'name' => 'Deluxe',
            'fasilitas' => 'AC,TV,KULKAS',
            'harga' => 90000,
            'deskripsi' => 'kamar ini luas',
            'foto' => 'foto/deluxe.jpg',
        ]);

         Type::create([
            'name' => 'Superrior',
            'fasilitas' => 'AC,TV,KULKAS,Bathub',
            'harga' => 12000,
            'deskripsi' => 'kamar ini sangat cocok untuk anda',
            'foto' => 'foto/superior.jpg',
        ]);

        Room::create([
            'name' => 'Kamar 101',
            'type_id' => 1
        ]);

        Room::create([
            'name' => 'Kamar 102',
            'type_id' => 1
        ]);
        Room::create([
            'name' => 'Kamar 201',
            'type_id' => 2
        ]);
        Room::create([
            'name' => 'Kamar 202',
            'type_id' => 2
        ]);

        Room::create([
            'name' => 'Kamar 301',
            'type_id' => 3
        ]);

        Room::create([
            'name' => 'Kamar 302',
            'type_id' => 3
        ]);
    }
}
