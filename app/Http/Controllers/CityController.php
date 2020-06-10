<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Requests\CitiesStoreRequest;
use App\Http\Requests\CitiesUpdateRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //zorgen dat
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create city', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit city', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete city', ['only' => ['delete', 'destroy']]);
    }

    //ophalen van de steden en returnen van de index.blade view
    public function index()
    {
        $cities = City::all();

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //het ophalen van de provincies zodat een stad binnen een provincie geplaatst kan worden, en returnen naar de create.blade view
    public function create()
    {
        $provinces = Province::all();
        return view('cities.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitiesStoreRequest $request)
    {
        //aanmaken nieuwe stad
        $city = new City();
        //attributen
        $city->name = $request->name;
        $city->description = $request->description;
        $city->province_id = $request->province_id;
        //stad bewaren in de database
        $city->save();

        return redirect()->route('cities.index')->with('message', 'Stad aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    //returnen van de show.blade view
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    //ophalen provincies en returnen edit.blade view
    public function edit(City $city)
    {
        $provinces = Province::all();
        return view('cities.edit', compact('city', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    //updaten van een stad
    public function update(CitiesUpdateRequest $request, City $city)
    {
        $city->name = $request->name;
        $city->description = $request->description;

        //city bewaren in de database
        $city->save();

        return redirect()->route('cities.index')->with('message', 'Stad aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    //returnen van de delete.blade view
    public function delete(City $city)
    {
        return view('cities.delete', compact('city'));
    }

    //het definitief verwijderen van een stad, met return naar de index.blade view
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'Stad verwijderd');
    }
}
