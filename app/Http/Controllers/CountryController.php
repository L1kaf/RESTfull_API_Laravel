<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Dotenv\Validator;

class CountryController extends Controller
{
    public function index() {
        return response()->json(Country::get(), 200);
    }

    public function show($id) {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($country, 200);
    }

    public function store(Request $request) {
        $data = $this->validate(
            $request, [
                'alias' => 'required',
                'name' => 'required|min:3',
                'name_en' => 'required|min:3'
            ]
        );
        $country = new Country();
        $country->fill($data)->save();
        return response()->json($country, 201);
    }

    public function update(Request $request, $id) {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function destroy(Request $request, $id) {
        $country = Country::find($id);
        if (is_null($country)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $country->delete();
        return response()->json('Country is deleted', 200);
    }
}
