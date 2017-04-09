<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Pin;

class PinController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = Pin::get()->toArray();
        return $this->getApiResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator = Validator::make($request->all(), [
            "pin_title" => "required|string",
            "pin_desc" => "nullable|string",
            "poster_name" => "nullable|string",
            "longitude" => "regex:/^-?\d{1,2}\.\d{6,}$/",
            "latitude" => "regex:/^-?\d{1,2}\.\d{6,}$/",
            "source" => "nullable|string"
        ]);

        if ($this->validator->fails()) {
            return $this->getApiResponse(400, 'Validation errors');
        }

        $pin = new Pin;
        $pin->fill($request->all());
        $pin->save();
        return $this->getApiResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pin = Pin::where('pin_id', '=', $id)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }
        else {
            $this->data = $pin->toArray();
            return $this->getApiResponse();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
