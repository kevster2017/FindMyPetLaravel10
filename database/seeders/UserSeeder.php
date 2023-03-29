<?php

Namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['firstName' => 'Kev', 'surname' => 'OKane','email' => 'kev@gmail.com', 'password' => bcrypt('password'), 'image' => 'uploads/profileImage.jpg', 'town' => 'Glengormley', 'postCode' => 'BT36', 'is_admin' => 1]);

        User::create(['firstName' => 'Eric', 'surname' => 'OKane','email' => 'eric@gmail.com', 'password' => bcrypt('password'), 'image' => 'uploads/eric.png', 'town' => 'Glengormley', 'postCode' => 'BT36','is_admin' => 0]);

        User::create(['firstName' => 'Luna', 'surname' => 'OKane','email' => 'luna@gmail.com', 'password' => bcrypt('password'), 'image' => 'uploads/luna.jpg', 'town' => 'Glengormley', 'postCode' => 'BT36','is_admin' => 0]);

        User::create(['firstName' => 'Rachel', 'surname' => 'OKane', 'email' => 'Rachel@gmail.com', 'password' => bcrypt('password'), 'image' => 'uploads/profileImage.jpg', 'town' => 'Glengormley', 'postCode' => 'BT36','is_admin' => 0]);
    }
}
