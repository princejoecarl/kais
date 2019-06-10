<?php

namespace Modules\Learner\Http\Controllers\Session;

use App\Http\Requests\Session\LearnerLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function __invoke(LearnerLoginRequest $request) : RedirectResponse
    {
        if ($request->isAuthorized($request->username, $request->password, 'learner')) {
            return redirect()->route('learner.skills.listing');
        }

        return redirect()
            ->back()
            ->withInput($request->only('username'))
            ->withErrors('These credentials do not match our records.');

    }
}
