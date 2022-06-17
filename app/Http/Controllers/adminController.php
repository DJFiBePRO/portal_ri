<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementRequest;
use App\management_translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Show the title and logo of the portal.
     *
     * @return Response
     */
    public function show()
    {
        $managementArea = \App\managementArea::firstOrFail();

        return view('admin/inicio')->withManagement($managementArea);
    }

    public function showParameterization()
    {
        $managementArea = \App\managementArea::firstOrFail();

        return view('admin/parameterization')->withManagement($managementArea);
    }

    public function update(Request $request)
    {
        $this->validate($request, [

            'managementAreaLogo' => 'mimes:jpeg,png|image',
            'managementAreaImage' => 'mimes:jpeg,png|image',
            'managementAreaCreate' => 'required|date|date_format:Y-m-d',
            'managementAreaName' => 'max:100',

        ]);

        $managementArea = \App\managementArea::firstOrFail();
        $managementArea->management_area_name = $request->managementAreaName;
        if ($request->hasFile('managementAreaLogo')) {
            $logo = $managementArea->management_area_logo;
            $managementArea->management_area_logo = $request->file('managementAreaLogo')->getClientOriginalName();
            $path = 'img/logos';
            $file = $request->file('managementAreaLogo');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path . '/' . $logo);
        }
        if ($request->hasFile('managementAreaImage')) {
            $imagen = $managementArea->management_area_image;
            $managementArea->management_area_image = $request->file('managementAreaImage')->getClientOriginalName();
            $path = 'img/vinculacion';
            $file = $request->file('managementAreaImage');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path . '/' . $imagen);
        }
        $managementArea->management_area_create = $request->managementAreaCreate;
        $managementArea->save();
        unset($managementArea);
        unset($file);
        unset($filename);
        unset($path);
        unset($request);


        return back()->withMensaje('Operación Exitosa');
    }


    public function showMission()
    {
        $managementArea = \App\managementArea::firstOrFail();
        $managementTranslation = \App\management_translation::all();

        return view('admin/mision')->withManagementTrans($managementTranslation)->withManagement($managementArea);
        // return dd($managementTranslation);
    }

    public function updateMission(Request $request)
    {
        $rules = [];
        foreach (config('laravellocalization.supportedLocales') as $locale => $value) {
            $rules += [
                "$locale.managementAreaMission" => 'required',
                "$locale.managementAreaVision" => 'required',

            ];
        }
        $this->validate($request, $rules);
        $datos = $request->except(['_token', '_method']);

       \App\management_translation::where('locale', 'en')->update(
            [
                'mission_translation' => $datos['en']['managementAreaMission'],
                'vission_translation' => $datos['en']['managementAreaVision'],
            ]
        );
        //  $managementArea->mission_translation = $request->managementAreaMission;
        //  $managementArea->vission_translation = $request->managementAreaVision;
        //  $managementArea->save();
        \App\management_translation::where('locale', 'es')->update(
            [
                'mission_translation' => $datos['es']['managementAreaMission'],
                'vission_translation' => $datos['es']['managementAreaVision'],
            ]
        );
        //  $managementArea = \App\management_translation::where('locale','en');
        //  $managementArea->mission_translation = $request->managementAreaMission;
        //  $managementArea->vission_translation = $request->managementAreaVision;
        //  $managementArea->save();
        return back()->withMensaje('Operación Exitosa');
    }

    public function showObjective()
    {
        $managementArea = \App\managementArea::firstOrFail();
        $managementTranslation = \App\management_translation::all();

        return view('admin/objective')->withManagementTrans($managementTranslation)->withManagement($managementArea);
    }

    public function updateObjective(Request $request)
    {
        $rules = [];
        foreach (config('laravellocalization.supportedLocales') as $locale => $value) {
            $rules += [
                "$locale.managementAreaObjective" => 'required',

            ];
        }
        $this->validate($request, $rules);
        $datos = $request->except(['_token', '_method']);

       \App\management_translation::where('locale', 'en')->update(
            [
                'objective_translation' => $datos['en']['managementAreaObjective'],
            ]
        );
        \App\management_translation::where('locale', 'es')->update(
            [
                'objective_translation' => $datos['es']['managementAreaObjective'],
            ]
        );
        $this->validate($request, [

            'managementAreaImage.*' => 'mimes:jpeg,png|image',

        ]);

        $managementArea = \App\managementArea::firstOrFail();
        $managementArea->management_area_objective = $request->managementAreaObjective;

        if ($request->hasFile('managementAreaImage')) {
            $image = $managementArea->management_area_image_objective;
            $managementArea->management_area_image_objective = $request->file('managementAreaImage')->getClientOriginalName();
            $path = 'img/vinculacion';
            $file = $request->file('managementAreaImage');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path . '/' . $image);
        }
        $managementArea->save();
        unset($managementArea);
        unset($file);
        unset($filename);
        unset($path);
        unset($request);


        return back()->withMensaje('Operación Exitosa');
    }

    public function showFunctions()
    {
        $managementArea = \App\managementArea::firstOrFail();
        $managementTranslation = \App\management_translation::all();

        return view('admin/functions')->withManagementTrans($managementTranslation)->withManagement($managementArea);
    }

    public function updateFunctions(Request $request)
    {
        $rules = [];
        foreach (config('laravellocalization.supportedLocales') as $locale => $value) {
            $rules += [
                "$locale.managementAreaFunctions" => 'required',
                "$locale.managementAreaDescription" => 'required',

            ];
        }
        $this->validate($request, $rules);
        $datos = $request->except(['_token', '_method']);

       \App\management_translation::where('locale', 'en')->update(
            [
                'function_translation' => $datos['en']['managementAreaFunctions'],
                'about_translation' => $datos['en']['managementAreaDescription'],
            ]
        );
        \App\management_translation::where('locale', 'es')->update(
            [
                'function_translation' => $datos['es']['managementAreaFunctions'],
                'about_translation' => $datos['es']['managementAreaDescription'],
            ]
        );
        return back()->withMensaje('Operación Exitosa');
    }

    public function showDirection()
    {
        $managementArea = \App\managementArea::firstOrFail();

        return view('admin/direction')->withManagement($managementArea);
    }

    public function updateDirection(Request $request)
    {

        $this->validate($request, [

            'managementAreaMail' => 'max:100|email',
            'managementAreaPhone' => 'max:100',
            'managementAreaMap' => 'max:800',

        ]);
        $managementArea = \App\managementArea::firstOrFail();
        $managementArea->management_area_direction = $request->managementAreaDirection;
        $managementArea->management_area_mail = $request->managementAreaMail;
        $managementArea->management_area_phone = $request->managementAreaPhone;
        $managementArea->management_area_map = $request->managementAreaMap;
        $managementArea->save();
        unset($managementArea);
        unset($request);

        return back()->withMensaje('Operación Exitosa');
    }
    public function store(ManagementRequest $request)
    {
        # code...
    }
}
