<?php

namespace Modules\Admin\Http\Controllers\Session;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\Session\AdminLoginRequest;

class LoginController extends Controller
{
    public function __invoke(AdminLoginRequest $request) : RedirectResponse
    {
        if ($request->isAuthorized($request->username, $request->password, 'admin')) {
            return redirect()->route('admin.organization');
        }

        return redirect()
            ->back()
            ->withInput($request->only('username'))
            ->withErrors('These credentials do not match our records.');

    }
}
