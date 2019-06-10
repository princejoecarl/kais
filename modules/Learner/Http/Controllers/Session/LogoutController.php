<?php

namespace Modules\Learner\Http\Controllers\Session;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public function __invoke() : RedirectResponse
    {
        Auth::guard('learner')->logout();
        return redirect()->route('learner.login');
    }
}
