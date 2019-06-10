<?php

namespace Modules\Learner\Http\Controllers\Skill;

use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SkillListingController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user('learner');

        $skills = Skills::whereOrganization($user->organization)->get();
        return view('learner::skill.listing', compact('skills'));
    }
}
