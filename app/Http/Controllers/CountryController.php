<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index() {
        return response()->json(Country::get(), 200);
    }

    public function show($id) {
        return response()->json(Country::find($id), 200);
    }

    public function store(Request $request) {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    public function update(Request $request, Country $country) {
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function destroy(Request $request, Country $country) {
        $country->delete();
        return response()->json('Country is deleted', 200);
    }
}
