<?php

use Illuminate\Database\Seeder;
use App\Organization;
use App\Procedure;
use App\Skills;

class DummyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $org = \factory(Organization::class)->create();
        $skill = \factory(Skills::class)->create(['organization' => $org->code]);

        \factory(Procedure::class, 10)->create(['skill' => $skill->id]);
    }
}
