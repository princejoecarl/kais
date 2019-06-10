<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LearnerLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('learner')->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "username" => "required|min:1",
            "password" => "required|min:1",
        ];
    }

    public function isAuthorized(string $username, string $password, string $guard = null) : bool
    {
        return Auth::guard($guard)->attempt([
            'username'          => $username,
            'password'          => $password,
        ]);
    }
}
