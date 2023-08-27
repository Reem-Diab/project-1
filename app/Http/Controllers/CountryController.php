<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $countries = Country::withoutTrashed()->orderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.country.index' , compact('countries'));
    }


    public function indexTrashed()
    {

        $countries = Country::onlyTrashed()->orderBy('deleted_at' , 'desc')->get();
        return response()->view('cms.country.trashed' , compact('countries'));
    }


    public function restore($id){
        $countries = Country::onlyTrashed()->findOrFail($id)->restore();
        //  return ['redirect' => route('countries.index')];
    }

    public function forceDelete($id) {
        $countries = Country::onlyTrashed()->findOrFail($id)->forceDelete();
        // return ['redirect' => route('countries.index')];

    }

    public function forceDeleteAll() {
        $countries = Country::onlyTrashed()->forceDelete();
        // return ['redirect' => route('countries.index')];

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all() , [
            'country_name'=>'required|string|min:3|max:20|unique:countries',
            'code'=>'required|numeric|digits:4'
        ]);

        if ($validator->fails()){
            return response()->json([
                'icon'=>'error',
                'title'=>$validator->getMessageBag()->first(),
            ] , 400);
        }

        else{

        $country = new Country();
        $country->country_name = $request->input('country_name');
        $country->code = $request->input('code');
        $isSaved = $country->save();
    
        if ($isSaved) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Save Success'
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Save Failed'
            ] , 200);
        }
    }
        }

    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.show' , compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit' , compact('countries'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all() , [
            'country_name'=>'sometimes|required|string|min:3|max:20',
            'code'=>'sometimes|required|numeric|digits:4'
        ]);

        if (! $validator->fails()){
            $countries = Country::findOrFail($id);
            $countries->country_name = $request->get('country_name');
            $countries->code = $request->get('code');
            $isUpdate = $countries->save();
            return ['redirect' => route('countries.index')];

    }

    else{
        return response()->json([
            'icon'=>'error',
            'title'=>$validator->getMessageBag()->first(),
        ] , 400);
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $countries = Country::destroy($id);

        // $countries = Country::findOrFail($id)->delete();
    }
    public function trunCate()
    {
        $countries = DB::table('countries')->trunCate();
        // return ['redirect' => route('countries.index')];
        // $countries = Country::findOrFail($id)->delete();
    }
}
