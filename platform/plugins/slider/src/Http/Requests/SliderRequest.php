<?php

namespace Botble\Slider\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class SliderRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required',
            'button_1_url'   => 'required',
            'button_1'   => 'required',
            'slug'   => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
