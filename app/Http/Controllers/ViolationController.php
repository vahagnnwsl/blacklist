<?php

namespace App\Http\Controllers;

use App\ArendatorViolation;
use Illuminate\Http\Request;


class ViolationController extends Controller
{

    public function update(Request $request, $id)
    {
        $violation = ArendatorViolation::findOrFail($id);
        $violation->update(['status' => (int)$request->get('status')]);

        return response()->json([]);
    }
}
