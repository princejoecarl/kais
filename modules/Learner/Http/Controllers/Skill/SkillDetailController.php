<?php

namespace Modules\Learner\Http\Controllers\Skill;

use App\Procedure;
use App\Skills;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class SkillDetailController extends Controller
{
    public function __invoke(Skills $skill) : View
    {
        $procedures = Procedure::whereSkill($skill->id)->get();

        return view('learner::skill.detail', compact('skill', 'procedures'));
    }
}
