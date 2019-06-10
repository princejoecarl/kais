<?php

namespace Modules\Learner\Http\Controllers\Forum;

use App\Forum\Topic;
use App\ForumTopic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TopicListingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $topics = Topic::whereIn('id', ForumTopic::select('topic_id')->where(['organization' => $request->user('learner')->organization]))->get();

        return view('learner::forum.topic.listing', compact('topics'));
    }
}
