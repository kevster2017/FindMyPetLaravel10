<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Missing;

class MissingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Missing Pets 
        Missing::create(['user_id' => 1, 'firstName' => 'Kev', 'surname' => 'OKane', 'petName' => 'Tyson', 'petType' => 'Dog', 'petAge' => 16, 'chipNum' => 123, 'description' => 'Awesome Dog', 'town' => 'Glengormley', 'postCode' => 'BT36', 'img1' => '/uploads/Tyson.jpg', 'img2' => '/uploads/profileImage.jpg', 'img3' => '/uploads/profileImage.jpg', 'reunited' => 0]);

        Missing::create(['user_id' => 2, 'firstName' => 'Eric', 'surname' => 'OKane', 'petName' => 'Eric', 'petType' => 'Cat', 'petAge' => 16, 'chipNum' => 234, 'description' => 'Awesome Cat', 'town' => 'Glengormley', 'postCode' => 'BT36', 'img1' => '/uploads/Eric.jpg', 'img2' => '/uploads/profileImage.jpg', 'img3' => '/uploads/profileImage.jpg', 'reunited' => 0]);

        Missing::create(['user_id' => 3, 'firstName' => 'Luna', 'surname' => 'OKane', 'petName' => 'Luna', 'petType' => 'Other', 'petAge' => 16, 'chipNum' => 456, 'description' => 'Awesome Other', 'town' => 'Glengormley', 'postCode' => 'BT36', 'img1' => '/uploads/Luna.jpg', 'img2' => '/uploads/profileImage.jpg', 'img3' => '/uploads/profileImage.jpg', 'reunited' => 0]);

        //Reunited Pets
        Missing::create(['user_id' => 1, 'firstName' => 'Kev', 'surname' => 'OKane', 'petName' => 'Tyson', 'petType' => 'Dog', 'petAge' => 16, 'chipNum' => 123, 'description' => 'Awesome Dog', 'town' => 'Glengormley', 'postCode' => 'BT36', 'img1' => '/uploads/Tyson.jpg', 'img2' => '/uploads/profileImage.jpg', 'img3' => '/uploads/profileImage.jpg', 'reunited' => 1]);

        Missing::create(['user_id' => 2, 'firstName' => 'Eric', 'surname' => 'OKane', 'petName' => 'Eric', 'petType' => 'Cat', 'petAge' => 4, 'chipNum' => 123, 'description' => 'Awesome Cat', 'town' => 'Glengormley', 'postCode' => 'BT36', 'img1' => '/uploads/Eric.jpg', 'img2' => '/uploads/profileImage.jpg', 'img3' => '/uploads/profileImage.jpg', 'reunited' => 1]);
    }
}
