<?php

namespace Modules\Organization\Http\Controllers;

use App\Procedure;
use App\Skills;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class SkillProcedures extends Controller
{
    public function __invoke(Skills $skill) : View
    {
        $procedures = Procedure::whereSkill($skill->id)->get();

        return view('organization::skill.procedure', compact('procedures', 'skill'));
    }
}
