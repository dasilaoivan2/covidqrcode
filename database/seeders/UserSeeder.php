<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['name' => 'Ivan Dasilao',
                'email' => 'dasilaoivan2@gmail.com',
                'password' => Hash::make('mingkhalifa2')

            ],
            ['name' => 'Jigs',
                'email' => 'juneljigjimenez@gmail.com',
                'password' => Hash::make('jigs')

            ],
            ['name' => 'Printer User',
                'email' => 'printeruser@gmail.com',
                'password' => Hash::make('printeruser')

            ],
            ['name' => 'User 1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('user1')

            ],
            ['name' => 'User 2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('user2')

            ],
            ['name' => 'User 3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('user3')

            ],
            ['name' => 'User 4',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('user4')

            ]

        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
