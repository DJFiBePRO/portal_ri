<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class magazineController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[

  			'magazineName' => 'required|max:200|unique:magazine,magazine_name',
  			'magazineImage' => 'required|mimes:svg,jpg,jpeg,png|max:10000',
  			'magazineFile' => 'required|mimes:pdf|max:10000',
  			'magazineFlash' => 'required|mimes:swf|max:10000',

  			]);

  		$image = $request->magazineImage;
  		$file = $request->magazineFile;
  		$flash = $request->magazineFlash;
  		\App\magazine::create([
  			'magazine_name' => $request['magazineName'],
  			'magazine_image' => $image->getClientOriginalName(),
  			'magazine_file'=>$file->getClientOriginalName(),
  			'magazine_flash'=> $flash->getClientOriginalName(),
        'magazine_state' => 1,
  			'magazine_management_area' => 1,
  			]);

  		$path = 'magazines';
  		$imageName =$image->getClientOriginalName();
  		$image->move($path.'/image', $imageName);

      $nameFile = $file->getClientOriginalName();
      $file->move($path.'/file', $nameFile);

      $nameFlash = $flash->getClientOriginalName();
      $flash->move($path.'/flash', $nameFlash);

  		unset($request);
  		return back()->withMensaje('Operación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $userType = Auth::user()->user_type;
  		if ($userType!=1){
  			$magazines = \App\magazine::where('magazine_state',1)->orderBy('magazine_id', 'desc')->get();
  		}else{
  				$magazines = \App\magazine::orderBy('magazine_id', 'desc')->get();
  		}
      $managementArea = \App\managementArea::firstOrFail();

  		return view ('admin.magazines')
  		->withManagement($managementArea)
  		->withMagazines($magazines);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $magazine= \App\magazine::find($request['magazineId']);
      $this->validate($request,[

        'magazineName' => 'required|max:200|unique:magazine,magazine_name',
        'magazineImage' => 'mimes:svg,jpg,jpeg,png|max:10000',
        'magazineFile' => 'mimes:pdf|max:10000',
        'magazineFlash' => 'mimes:swf|max:10000',

        ]);

      $magazine->magazine_name   = $request['magazineName'];
      $path = 'magazines';
      if($request->hasFile('magazineImage')){
        $imagen = $magazine->magazine_image;
        $magazine->magazine_image = $request->file('magazineImage')->getClientOriginalName();
        $file = $request->file('magazineImage');
        $filename = $file->getClientOriginalName();
        $file->move($path.'/image', $filename);
        \File::delete($path.'/'.$imagen);
      }
      if($request->hasFile('magazineFile')){
        $archivoPDF = $magazine->magazine_file;
        $magazine->magazine_file = $request->file('magazineFile')->getClientOriginalName();
        $file = $request->file('magazineFile');
        $filename = $file->getClientOriginalName();
        $file->move($path.'/image', $filename);
        \File::delete($path.'/'.$archivoPDF);
      }
      if($request->hasFile('magazineFlash')){
        $archivoFlash = $magazine->magazine_flash;
        $magazine->magazine_flash = $request->file('magazineFlash')->getClientOriginalName();
        $file = $request->file('magazineFlash');
        $filename = $file->getClientOriginalName();
        $file->move($path.'/image', $filename);
        \File::delete($path.'/'.$archivoFlash);
      }
      $magazine->save();
      unset($request);
      unset($magazine);
      return back()->withMensaje('Operación Exitosa');
    }

    public function delete (Request $request){
      $magazine = \App\magazine::find($request['magazineId']);
      $magazine->magazine_state = 0;
      $magazine->save();

      unset($request);
      return back()->withMensaje('Operación Exitosa');
    }
}
