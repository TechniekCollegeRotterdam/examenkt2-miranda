<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Requests\ProvinceStoreRequest;
use App\Http\Requests\ProvinceUpdateRequest;
use Throwable;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //haalt alle provincies op en returned de view
    public function index()
    {
        $provinces = Province::all();

        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //returned de create.blade view
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //opslaan van nieuwe provincies
    public function store(ProvincesStoreRequest $request)
    {
        //Aanmaken nieuwe provincie
        $province = new Province();
        //attributen
        $province->name = $request->name;
        //Provincie opslaan in de database
        $province->save();

        return redirect()->route('provinces.index')->with('message', 'Provincie aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    //returned de show.blade view
    public function show(Province $province)
    {
        return view('provinces.show', compact('province'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    //returned de edit.blade view
    public function edit(Province $province)
    {
        return view('provinces.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    //updaten van een provincie wanneer deze aangepast is
    public function update(ProvincesUpdateRequest $request, Province $province)
    {
        $province->name = $request->name;

        $province->save();

        return redirect()->route('provinces.index')->with('message', 'Provincie aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    //returned naar de delete.blade view
    public function delete(Province $province)
    {
        return view('provinces.delete', compact('province'));
    }
// definitief verwijderen provincie
    public function destroy(Province $province)
    {
        //proberen om te verwijderen
        try {
            $province->delete();
            //provincie met steden mag niet worden verwijderd, hier stuurt hij je terug naar de index.blade view met de message
        }catch (Throwable $e){
            report($e);
            return redirect()->route('provinces.index')->with('red', 'Provincie kan niet worden verwijderd');
        }
        return redirect()->route('cities.index')->with('message', 'Stad verwijderd');
    }
}
