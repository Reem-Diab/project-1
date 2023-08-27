<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::orderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.city.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'name' => 'required' ,
            'street' => 'required' ,
        ] , [

        ]);

        if( ! $validator->fails()){
            $cities = new City();
            $cities->name = $request->input('name');
            $cities->street = $request->input('street');
            $cities->country_id = $request->input('country_id');

            $isSaved = $cities->save();
            return response()->json([
               'icon' => 'success' ,
               'title' => 'Created is Successfully'
            ], 200);
       }
       else{
            return response()->json([
               'icon' => 'error' ,
               'title' => $validator->getMessageBag()->first(),
            ] , 400);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countries = Country::all();
        $cities = City::findOrFail($id);
        return response()->view('cms.city.edit' , compact('cities' , 'countries'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all() ,[
            'name' => 'required' ,
            'street' => 'required' ,
            ] , [
    
            ]);
            if(! $validator->fails()){
                  $cities = City::findOrFail($id);
                  $cities->name = $request->input('name');
                  $cities->street = $request->input('street');
                  $cities->country_id = $request->input('country_id');
    
                  $isUpdated = $cities->save();
                  return ['redirect' => route('cities.index')];
            }
            else{
                return response()->json([
                    'icon' => 'error' ,
                    'title' => $validator->getMessageBag()->first(),
                ], 400);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $countries = Country::destroy($id);

    }
}
