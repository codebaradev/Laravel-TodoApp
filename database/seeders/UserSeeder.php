<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([  
            'username' => 'baracode',
            'email' => 'codebara1@gmail.com',
            'password' => bcrypt('baracode123'),
        ]);
        $user->save();

        $user = new User([  
            'username' => 'codebara',
            'email' => 'codebara@gmail.com',
            'password' => bcrypt('codebara123'),
        ]);
        $user->save();
    }
}
