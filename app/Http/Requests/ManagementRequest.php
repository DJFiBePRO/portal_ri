<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
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
                "$locale.managementAreaMission" => 'required',
                "$locale.managementAreaVision"=> 'required',
                "$locale.managementAreaObjective"=> 'required',
                "$locale.managementAreaFunctions"=> 'required',
                "$locale.managementAreaDescription"=> 'required',
            ];
        }
        return $rules;
    }
}
