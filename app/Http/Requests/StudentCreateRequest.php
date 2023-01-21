<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            //new students tak boleh sama dgn students lain
            //students: nama column dalam STUDENTS table
            'name' => 'required',
            'gender' => 'required',
            'nis' => 'unique:students|max:7|required',
            'class_id' => 'required'
            //validation stop/fail: new students will not execute to CREATE execution process
        ];
    }

    //customize error messages: name of label of every user input 
    public function attributes()
    {
        return [
            'name' => 'Name',
            'gender' => 'Gender',
            'nis' => 'NIS',
            'class_id' => 'Class'
        ];
    }

    //customize error messages 
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'gender.required' => 'Gender field is required', 
            'nis.unique' => 'NIS has been taken',
            'nis.required' => 'NIS field is required',
            'nis.max' => 'NIS field must not greater than :max characters', //:max->how many max char on rules function
            'class_id.required' => 'Class is required'


        ];
    }
}
