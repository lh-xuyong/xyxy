<?php

namespace App\Http\Controllers\Api;

use App\Model\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CxyController extends Controller
{
    public function Parameters()
    {

        //CXY === 蔡徐坤
        //CXY === 蔡徐坤
        //CXY === 蔡徐坤
        //CXY === 蔡徐坤
        //CXY === 蔡徐坤
        //CXY === 蔡徐坤

        $data = [
            'data' => Parameter::all(),
        ];
        return response()->json($data);
    }
}
