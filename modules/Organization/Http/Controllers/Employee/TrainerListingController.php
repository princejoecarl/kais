<?php

namespace Modules\Organization\Http\Controllers\Employee;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TrainerListingController extends Controller
{
    public function __invoke(Request $request)
    {
        $trainers = User::where([
            'organization' => $request->user('organization')->organization,
            'is_administrator' => false,
        ])->get();
        return view('organization::employee.listing', compact('trainers'));
    }
}
