<?php

namespace Modules\Organization\Http\Controllers\Session;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Organization\Http\Requests\Session\OrganizationLoginRequest;

class LoginController extends Controller
{
    public function __invoke(OrganizationLoginRequest $request) : RedirectResponse
    {
        if ($request->isAuthorized($request->username, $request->password, 'organization')) {
            return redirect()->route('skills.listing');
        }

        return redirect()
            ->back()
            ->withInput($request->only('username'))
            ->withErrors('These credentials do not match our records.');

    }
}
