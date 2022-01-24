<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
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
        $this->validate($request,[

            'managementAreaLogo' => 'mimes:jpeg,png|image',
            'managementAreaImage' => 'mimes:jpeg,png|image',
            'managementAreaCreate' => 'required|date|date_format:Y-m-d',
            'managementAreaName' => 'max:100',

            ]);

        $managementArea = \App\managementArea::firstOrFail();
        $managementArea->management_area_name = $request->managementAreaName;
        if($request->hasFile('managementAreaLogo')){
            $logo = $managementArea->management_area_logo;
            $managementArea->management_area_logo =$request->file('managementAreaLogo')->getClientOriginalName();
            $path = 'img/logos';
            $file = $request->file('managementAreaLogo');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path.'/'.$logo);
        }
        if($request->hasFile('managementAreaImage')){
            $imagen = $managementArea->management_area_image;
            $managementArea->management_area_image =$request->file('managementAreaImage')->getClientOriginalName();
            $path = 'img/vinculacion';
            $file = $request->file('managementAreaImage');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path.'/'.$imagen);
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

        return view('admin/mision')->withManagement($managementArea);
    }

    public function updateMission(Request $request)
    {

     $this->validate($request,[

        'managementAreaImage' => 'mimes:jpeg,png|image',

        ]);

     $managementArea = \App\managementArea::firstOrFail();
     $managementArea->management_area_mission = $request->managementAreaMission;

     if($request->hasFile('managementAreaImage')){
        $image = $managementArea->management_area_image_mission;
        $managementArea->management_area_image_mission =$request->file('managementAreaImage')->getClientOriginalName();
        $path = 'img/vinculacion';
        $file = $request->file('managementAreaImage');
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);
        \File::delete($path.'/'.$image);
    }
    $managementArea->management_area_vision = $request->managementAreaVision;
    $managementArea->save();
    unset($managementArea);
    unset($file);
    unset($filename);
    unset($path);
    unset($request);
    return back()->withMensaje('Operación Exitosa');


}

public function showObjective()
{
    $managementArea = \App\managementArea::firstOrFail();

    return view('admin/objective')->withManagement($managementArea);
}

public function updateObjective(Request $request)
{

    $this->validate($request,[

        'managementAreaImage' => 'mimes:jpeg,png|image',

        ]);

    $managementArea = \App\managementArea::firstOrFail();
    $managementArea->management_area_objective = $request->managementAreaObjective;

    if($request->hasFile('managementAreaImage')){
        $image = $managementArea->management_area_image_objective;
        $managementArea->management_area_image_objective =$request->file('managementAreaImage')->getClientOriginalName();
        $path = 'img/vinculacion';
        $file = $request->file('managementAreaImage');
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);
        \File::delete($path.'/'.$image);
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

    return view('admin/functions')->withManagement($managementArea);
}

public function updateFunctions(Request $request)
{
    $managementArea = \App\managementArea::firstOrFail();
    $managementArea->management_area_functions = $request->managementAreaFunctions;
    $managementArea->management_area_description = $request->managementAreaDescription;
    $managementArea->save();
    unset($managementArea);
    unset($request);

    return back()->withMensaje('Operación Exitosa');


}

public function showDirection()
{
    $managementArea = \App\managementArea::firstOrFail();

    return view('admin/direction')->withManagement($managementArea);
}

public function updateDirection(Request $request)
{

    $this->validate($request,[

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
}
