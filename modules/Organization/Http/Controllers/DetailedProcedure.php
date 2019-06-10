<?php

namespace Modules\Organization\Http\Controllers;

use App\Procedure;
use App\Skills;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class DetailedProcedure extends Controller
{
    public function __invoke(Skills $skill, Procedure $procedure) : View
    {
        return view('organization::procedure', compact('procedure', 'skill'));
    }
}
