<?php
	namespace App\Http\Requests;

	use App\Http\Requests\Request;
	use App\Food;

class FoodRequest extends Request {

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
		$food = Food::find($this->food);
		return [
			'name' => 'required|unique:foods,id|min:5',
			'price' => 'required'
			//'content' => 'required|min:5'
		];
	}

}
