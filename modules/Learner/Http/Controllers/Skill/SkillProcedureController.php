<?php

namespace Modules\Learner\Http\Controllers\Skill;

use App\Procedure;
use App\Skills;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class SkillProcedureController extends Controller
{
    public function __invoke(Skills $skill, Procedure $procedure) : View
    {
        return view('learner::procedure', compact('procedure', 'skill'));
    }
}
