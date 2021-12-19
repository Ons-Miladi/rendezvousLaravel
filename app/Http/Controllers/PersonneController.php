<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnes=Personne::all();
        return response()->json($personnes,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $persone=Personne::create($request->all());
       if($persone){
        return response()->json($persone,200);
       }else {return response()->json(['error'=>'eeeerorr']);}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persone=Personne::find($id);
        return response()->json($persone,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $persone=Personne::find($id);
       $persone=$persone->update($request->all());
       $persones=Personne::all();
       return response()->json($persones,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   $personne=Personne::find($id);
   if($personne->delete()){
    $personnes=Personne::all();
    return response()->json($personnes,200);
   }
    }
   
}
