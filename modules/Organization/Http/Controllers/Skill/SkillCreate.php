<?php

namespace Modules\Organization\Http\Controllers\Skill;

use App\Forum\Topic;
use App\ForumTopic;
use App\Models\KnowledgeLevel;
use App\Skills;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Modules\Organization\Http\Requests\Skill\CreateSkillRequest;

class SkillCreate extends Controller
{
    public function __invoke() : View
    {
        $knowledgeLevels = KnowledgeLevel::getKnowledgeLevels();
        return view('organization::skill.create', compact('knowledgeLevels'));
    }

    public function submit(CreateSkillRequest $request) : RedirectResponse
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['name']);
        $data['organization'] = $request->user('organization')->organization;


        $image=$data['image'];
        $input = time(). "." . $image->getClientOriginalExtension();
        $destinationPath = 'uploads/images';
        $image->move($destinationPath, $input);
        $data['image_url'] = $destinationPath . '/' . $input;
        unset($data['image']);

        $skill = Skills::firstOrCreate($data);

        // create initial forum for this topic
        $forumData['title'] = $data['name'];
        $forumData['slug'] = $data['slug'];
        $forumData['skill_id'] = $skill->id;
        $forumData['owner_id'] = $request->user('organization')->id;
        $forumData['description'] = $data['description'];

        $topic = Topic::firstOrCreate($forumData);

        ForumTopic::firstOrCreate([
            'organization' => $data['organization'],
            'topic_id' => $topic->id,
        ]);

        return redirect()->route('skill.detail', compact('skill'));
    }
}
