<?php

namespace Modules\Organization\Http\Controllers\Skill;

use App\Skills;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SkillListing extends Controller
{
    public function __invoke() : View
    {
        $skills = Skills::all();
        return view('organization::skill.listing', compact('skills'));
    }
}
