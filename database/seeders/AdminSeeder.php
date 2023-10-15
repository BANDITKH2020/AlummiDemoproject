<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Admintest',
            'lastname'=> 'rmutt',
            'student_id'=> 'Admin',
            'student_grp'=> 'Admin',
            'graduatesem'=> 'null',
            'Term'=> 'null',
            'inviteby'=> 'Admin',
            'email' => 'admintestrmutt',
            'password' => Hash::make('rmutt123456'),
            'google_id' => 'Admin',
            'role_acc' => 'Admin',
            'groupleader'=> 'Admin',
            'educational_status'=> 'Admin',
        ]);
    }
}

