<?php

namespace Modules\Organization\Http\Controllers\Learner;

use App\Models\User\Learner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LearnerListingController extends Controller
{
    public function __invoke(Request $request)
    {
        $learners = Learner::where([
            'organization' => $request->user('organization')->organization,
        ])->get();

        return view('organization::learner.listing', compact('learners'));
    }
}
