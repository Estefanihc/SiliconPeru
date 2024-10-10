<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear users de prueba
        $user1 = new User();
        $user1->name = "Sebasthian";
        $user1->email = "s@gmail.com";
        $user1->password = "123456";
        $user1->save();

        $user2 = new User();
        $user2->name = "Estefani";
        $user2->email = "e@gmail.com";
        $user2->password = "123456";
        $user2->save();

        $user3 = new User();
        $user3->name = "Aaron";
        $user3->email = "a@gmail.com";
        $user3->password = "123456";
        $user3->save();
    }
}
