<?php 
namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehicleRequest extends Request 
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
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required',
            'manufacturer' => 'required',
            'email_address' => 'required|email',
            'type' => 'required',
            'year' => 'required',
            'colour' => 'required',
            'mileage' => 'required'
        ];
    }
}
