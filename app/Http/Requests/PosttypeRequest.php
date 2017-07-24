<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Posttype;


class PosttypeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$posttype = Posttype::find($this->posttype);
        return [
			//'name' => 'required|unique:posttypes,id|min:5,'.$this->id,
            'name' => 'required|unique:posttypes |min:5',
			//'content' => 'required|min:5'
		];
    }
}
