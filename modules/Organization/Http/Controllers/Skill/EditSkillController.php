<?php

namespace Modules\Organization\Http\Controllers\Skill;

use App\Models\KnowledgeLevel;
use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EditSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('organization::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('organization::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('organization::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Skills $skill)
    {
        $knowledgeLevels = KnowledgeLevel::getKnowledgeLevels();
        return view('organization::skill.edit', compact('skill', 'knowledgeLevels'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Skills $skill)
    {
        $data = $request->except('_token');
        $image=$data['image'];
        $input = time(). "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads/images';
        $image->move($destinationPath, $input);
        $data['image_url'] = $destinationPath . '/' . $input;
        unset($data['image']);

        $skill->update($data);

        return redirect()->route('skill.detail', compact('skill'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
