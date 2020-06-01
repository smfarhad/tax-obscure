<?php

namespace App\Http\Requests;


//use App\Http\Requests\SearchRequest;
use App\Http\Requests\Request;

class SearchRequest extends Request
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
            'search' =>'required|numeric'
        ];
    }
    
    /**
     * custom error message 
     * 
     **/
    
    public function messages()
{
    return [
        'search.required' => 'Please put your 12 Digit TIN',
        'search.numeric' => 'Only Number is allowed',
        'search.min' => 'TIN is not Less than 12',
        'search.max' => 'TIN is not More 12',
    ];
}
    
}
