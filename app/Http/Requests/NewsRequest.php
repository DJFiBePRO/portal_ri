<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $rules = [];

        foreach (config('laravellocalization.supportedLocales') as $locale=>$value) {
            $rules += [
                "$locale.newsTitle" => 'required',
                "$locale.newsAlias"=> 'required',
                "$locale.newsDescription"=> 'required',
            ];
        $rules+=[
            'newsType'=>'required'];
        }
        return $rules;
    }
}
