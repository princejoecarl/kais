<?php

namespace Modules\Organization\Http\Controllers\Session;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public function __invoke() : RedirectResponse
    {
        Auth::guard('organization')->logout();
        return redirect()->route('organization.login');
    }
}
