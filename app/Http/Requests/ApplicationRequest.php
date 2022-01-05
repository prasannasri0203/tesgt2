<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'first'=>'required',
            'last'=>'required',
            'field_141'=>'required',
            'street'=>'required',
            'files' =>'mimes:jpeg,jpg,png',
            'field_120'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required|numeric',
            'email'=>'required|email',
            'field_11'=>'required',
            'field_106'=>'required',
            'field_112'=>'required',
            'field_289'=>'required',
            'field_266' =>'required',
        ];
    }
    
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first.required'=> 'First Name is Required', 
            'middle.required'=> 'Middle Name is Required', 
            'last.required'=> 'Last Name is Required',
            'field_141.required'=> 'Masjid Name is Required',
            'street.required'=> 'Street Address is Required',
            'street2.required'=> 'street Address2 is Required',
            'field_120.required'=>'zakah Request Number is Required',
            'city.required'=> 'City is Required',
            'state.required'=> 'State is Required',
            'zip.required'=> 'ZipCode is Required',
            'email.required'=> 'Email is Required',
            'field_11.required'=> 'Phone Number is Required',
            'field_106.required'=> 'Primary Reason for Zakah is Required',
            'field_112.required'=> 'Zakah Category is Required',
            'field_289.required'=> 'This Field is Required',
            'field_266.required' =>'Sharing of Zakah Information Waiver is required',
            'files.mimes'=>'It is only support the png,jpg and jpeg',
        ];
    }
}
