<?php

use Illuminate\Database\Seeder;
use App\Models\User\Learner;
use App\Organization;

class LearnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->learners() as $learner)
            if (!Learner::whereUsername($learner['username'])->first()) {
                Learner::firstOrCreate($learner);
            }
    }

    private function learners() : array
    {
        return [
            [
                'name' => "Jack",
                'username' => "jack",
                'password' => Hash::make('secret'),
                'organization' => Organization::getCodeByName('MSU-IIT Ceramics'),
            ],
            [
                'name' => "Rose",
                'username' => "rose",
                'password' => Hash::make('secret'),
                'organization' => Organization::getCodeByName('MSU-IIT Ceramics'),
            ],
        ];
    }
}
