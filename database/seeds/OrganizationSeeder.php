<?php

use Illuminate\Database\Seeder;
use App\Organization;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->organizations() as $organization)
            if (!Organization::whereName($organization['name'])->first()) {
                $organization['code'] = Uuid::uuid4();
                $organization['slug'] = Str::slug($organization['name']);

                Organization::firstOrCreate($organization);
            }
    }

    private function organizations() : array
    {
        return [
            [
                'name' => 'Knowledge Sharing Org',
                'about' => 'Administrator Organization',
            ],
            [
                'name' => 'MSU-IIT Ceramics',
                'about' => 'Ceramics Department',
            ],
        ];
    }
}
