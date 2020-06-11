<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvincePublicController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        return view('public.provinces.index', compact('provinces'));
    }

    public function show(Province $province)
    {
        return view('public.provinces.show', compact('province'));
    }
}
