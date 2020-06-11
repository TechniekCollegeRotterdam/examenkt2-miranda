<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityPublicController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return view('public.cities.index', compact('cities'));
    }

    public function show(City $city)
    {
        return view('public.cities.show', compact('city'));
    }
}
