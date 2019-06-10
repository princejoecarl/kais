<?php

namespace Modules\Organization\Http\Controllers\Skill;

use App\Procedure;
use App\Skills;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Organization\Http\Requests\Procedure\CreateProcedureRequest;

class SkillCreateProcedure extends Controller
{
    public function __invoke(Request $request, Skills $skill) : View
    {
        return view('organization::skill.procedure.create', compact('skill'));
    }

    public function submit(Skills $skill, CreateProcedureRequest $request) : RedirectResponse
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['name']);
        $data['skill'] = $skill->id;

        $video=$data['video'];
        $input = time(). "." . $video->getClientOriginalExtension();
        $destinationPath = 'uploads/videos';
        $video->move($destinationPath, $input);
        $data['video_url'] = $destinationPath . '/' . $input;
        unset($data['video']);

        $image=$data['image'];
        $input = time(). "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads/images';
        $image->move($destinationPath, $input);
        $data['poster_url'] = $destinationPath . '/' . $input;
        unset($data['image']);

        $procedure = Procedure::firstOrCreate($data);
        return redirect()->route('skill.procedure.detail', compact('skill', 'procedure'));
    }
}
