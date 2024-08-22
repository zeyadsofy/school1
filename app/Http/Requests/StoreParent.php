<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'Email' => 'required|unique:my__parents,Email,'.$this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Address_Father' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'Name_Father.required' => trans('Parent_trans.required_ar'),
            'Name_Father_en.required' => trans('Parent_trans.required_en'),
            'Email.required' => trans('Parent_trans.ُEmail_required'),
            'National_ID_Father.required' => trans('Parent_trans.National_ID_Father_required'),
            'Phone_Father.required' => trans('Parent_trans.Phone_Father_required'),
            'Job_Father.required' => trans('Parent_trans.Job_Father_required'),
            'Job_Father_en.required' => trans('Parent_trans.Job_Father_en'),
            'Address_Father.required' => trans('Parent_trans.Address_Father_required'),
            'Password.required' => trans('Parent_trans.password_required'),

        ];
    }
}