<?php

namespace App\Http\Controllers;

use Auth;
use App\covenant;
use App\continent;
use App\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$covenants = covenant::all();
        $continents = DB::table('continents')->get();
        $management = \App\managementArea::firstOrFail();
        $covenants = DB::table('covenants')->get();
        return view('admin.covenant.index', compact('covenants', 'management', 'continents'));
    }
    public function vista()
    {
        $management = \App\managementArea::firstOrFail();
        $covenants = DB::table('covenants')
            ->join('countrys', 'covenants.idCountry', '=', 'countrys.id')
            ->join('continents', 'continents.id', '=', 'countrys.idContinent')
            ->select('covenants.id', 'covenants.caracter', 'covenants.university', 'countrys.country as country', 'continents.continent as continent')
            ->get();
        $managementArea = DB::table('management_area')
            ->first();

        $social = DB::table('social_network')
            ->where('social_network_state', 1)
            ->get();
        $category = DB::table('link')
            ->leftJoin('category', 'category_id', '=', 'link.link_category')
            ->where('link_state', 1)
            ->orderBy('link.link_id', 'asc')
            ->get();
        //return dd($covenants);
        return view('convenios', compact('covenants', 'management','social','managementArea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $management = \App\managementArea::firstOrFail();
        $covenants = DB::table('covenants')->get();
        return view('admin.covenant.create', compact('covenants', 'management'));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd($request);
        $this->validate($request, [

            'caracter' => 'required',
            'university' => 'required',
            'idCountry' => 'required',
            'resolution' => 'required|mimes:pdf,doc,docx',
            'is_validity' => 'required',
        ]);

        $docs = $request->resolution;
        \App\covenant::create([
            'caracter' => $request['caracter'],
            'university' => $request['university'],
            'idCountry' => $request['idCountry'],
            'resolution' => $docs->getClientOriginalName(),
            'is_validity' => $request['is_validity'],
        ]);
        $path = 'covenants';
        $filename = $docs->getClientOriginalName();
        $docs->move($path . '/file', $filename);
        unset($request);
        //return dd();
        return back()->withMensaje('Operación Exitosa');
        //return redirect()->route('covenant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $management = \App\managementArea::firstOrFail();
        $covenant = covenant::find($id);
        $country = country::find($covenant->idCountry);
        $continent = continent::find($country->idContinent);

        $cid = $covenant->id;
        $caracter = $covenant->caracter;
        $university = $covenant->university;
        $continent = $continent->continent;
        $country = $country->country;
        $resolution = $covenant->resolution;
        $is_validity = $covenant->is_validity;
        $created_at = $covenant->created_at;
        $updated_at = $covenant->updated_at;
        $datos = compact("cid", "caracter", "university", "continent", "country", "resolution", "is_validity", "created_at", "updated_at");
        return view('admin.covenant.show', compact('management', "cid", "caracter", "university", "continent", "country", "resolution", "is_validity", "created_at", "updated_at"));
        //return dd($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $continents = DB::table('continents')->get();
        $countrys = DB::table('countrys')->get();
        $management = \App\managementArea::firstOrFail();
        $covenant = covenant::find($id);
        return view('admin.covenant.edit', compact('covenant', 'management', 'countrys', 'continents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $covenant = [
            'caracter' => $request['caracter'],
            'university' => $request['university'],
            'idCountry' => $request['idCountry'],
            'resolution' => $request['resolution'],
            'is_validity' => $request['is_validity'],
        ];

        if ($request->hasFile('resolution')) {
            $docs = $covenant['resolution'];
            $covenant['resolution'] = $request->file('resolution')->getClientOriginalName();
            $path = 'covenants';
            $file = $request->file('resolution');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            \File::delete($path . '/file' . $docs);
        }
        //return dd($covenant);
        covenant::where('id', '=', $id)->update($covenant);
        unset($request);
        unset($covenant);
        return redirect('admin/covenant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$covenant=DB::table('covenants')->where('id',$id)->delete();
        $covenant = covenant::find($id);
        $covenant->delete();
        return redirect('admin/covenant');
    }
}
