<?php

namespace App\Http\Controllers\System;

use App\Model\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Input;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->method() == 'POST'){
            $query = request()->keywords;
            $parameters = Parameter::where("name", "like","%$query%")->paginate();
            return view('system.parameters.index', [
                'parameters' => $parameters,
            ]);
        }
        $parameters = Parameter::paginate();
        dump($parameters);die;
        return view('system.parameters.index', [
            'parameters' => $parameters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.parameters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:parameters|max:255',
            'status' => 'required',
            'option_list' => 'required',
        ]);
        $parameter = new Parameter();
        $parameter->name = $request->name;
        $parameter->status = $request->status;
        $parameter->is_system = 1;
        $ops = explode(',', trim($request->option_list, ","));

        $option_list = [];
        try {
            foreach ($ops as $val) {
                $target = explode(":", $val);
                $option_list[$target[0]] = $target[1];
            }
        } catch (Exception $e) {
            return redirect('system/parameters/create');
        };

        $parameter->option_list = $option_list;
        $parameter->description = $request->description;
        $parameter->save();
        return redirect('/system/parameters', 302);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parameter = Parameter::findOrFail($id);
        return view('system.parameters/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parameter = Parameter::findOrFail($id);
        return view('system.parameters.edit', [
            'parameter' => $parameter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'option_list' => 'required',
        ]);
        $parameter = Parameter::findOrFail($id);
        $parameter->name = $request->name;
        $parameter->status = $request->status;
        $ops = explode(',', trim($request->option_list, ","));
        if (count($ops) === 0) {
            return redirect('system/parameters/');
        }
        $option_list = [];
        try {
            foreach ($ops as $val) {
                $target = explode(":", $val);
                $option_list[$target[0]] = $target[1];
            }
        } catch (Exception $e) {
            return redirect('system/parameters/create');
        };

        $parameter->option_list = $option_list;
        $parameter->description = $request->description;
        $parameter->update();
        return redirect('/system/parameters/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parameter = Parameter::findOrFail($id);
        $parameter->delete();
        return redirect('system/parameters', 302);
    }
}
