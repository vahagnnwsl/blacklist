<?php

namespace App\Http\Controllers;

use App\ArendatorViolation;
use App\Arendator;
use App\Services\FileUploaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        $text = $status === 1 ? 'Погашено' : 'Не погашено';

        return response()->json(['text' => $text]);
    }


    public function store(Request $request, $arenator_id)
    {

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['arendator_id'] = $arenator_id;

        if (key_exists('document', $data) && $data['document'] !== null) {
            $data['document'] = FileUploaderService::arendatorViolationFile($data['document']);
        }

        $violation  = ArendatorViolation::create($data);


        return response()->json(['violation' => $violation->with('user')->first()]);
    }
}
