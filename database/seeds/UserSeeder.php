<?php

use Illuminate\Database\Seeder;
use App\Organization;
use Illuminate\Support\Facades\Hash;
use App\Models\User\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users() as $user)
            if (!User::whereUsername($user['username'])->first()) {
                User::firstOrCreate($user);
            }
    }

    private function users() : array
    {
        return [
            [
                'name' => "Administrator",
                'username' => "admin",
                'password' => Hash::make('secret'),
                'organization' => Organization::getCodeByName('Knowledge Sharing Org'),
                'is_administrator' => true,
            ],
            [
                'name' => "Trainer",
                'username' => "trainer",
                'password' => Hash::make('secret'),
                'organization' => Organization::getCodeByName('MSU-IIT Ceramics'),
            ],
        ];
    }
}
