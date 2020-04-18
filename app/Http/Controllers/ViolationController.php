<?php

namespace App\Http\Controllers;

use App\ArendatorViolation;
use Illuminate\Http\Request;


class ViolationController extends Controller
{

    public function update(Request $request, $id)
    {
        $violation = ArendatorViolation::findOrFail($id);
        if ((int)$violation->status === 1) {
            $status = 0;

        } else {
            $status = 1;
        }

        $violation->update(['status' => $status]);

        $text = $status===1 ? 'Погашено': 'Не погашено';

        return response()->json(['text'=>$text]);
    }
}
