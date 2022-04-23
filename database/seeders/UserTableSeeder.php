<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use App\Models\Vendor;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'      => 'Shittu Oluwaseun',
            'email'     => 'shittuopeyemi24@gmail.com',
            'password'  => bcrypt('midshot17'),
            'type'      => User::SUPERADMIN,
            'telephone' => '09066100815',
            'profile_photo_path'    => 'profile-photos/author-four.jpg'
        ]);

        User::factory()->create([
            'name'      => 'Ojo Emmanuel',
            'email'     => 'ojotifeema@gmail.com',
            'password'  => bcrypt('password'),
            'type'      => User::SUPERADMIN,
            'telephone' => '09066100815',
            'profile_photo_path'    => 'profile-photos/author-two.jpg'
        ]);

        User::factory()->create([
            'name'      => 'Obayomi Oluwaseun',
            'email'     => 'oluwaseun@example.com',
            'password'  => bcrypt('password'),
            'type'      => User::AGENT,
            'telephone' => '09066100815',
            'profile_photo_path'    => 'profile-photos/author-one.jpg'
        ]);

        User::factory()->create([
            'name'      => 'Idowu Akeem',
            'email'     => 'akeen@example.com',
            'password'  => bcrypt('password'),
            'type'      => User::FREELANCER,
            'telephone' => '09066100815',
            'profile_photo_path'    => 'profile-photos/author-three.jpg'
        ]);

    }
}