<?php

namespace Modules\Organization\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class CreateSkillRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"          => "required|string",
            "description"   => "required|string",
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user('organization');
    }
}
