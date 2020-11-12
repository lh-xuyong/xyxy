<?php

namespace App\Http\Controllers\Api;

use App\Model\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CxyController extends Controller
{
    public function Parameters()
    {
        $data = [
            'data' => Parameter::all(),
        ];
        return response()->json($data);
    }
}
