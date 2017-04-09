<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;

use App\Pin;
use Validator;
use App\Thot;

class ThotController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @param  int  $parentId
     * @return \Illuminate\Http\Response
     */
    public function index($parentId)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }

        $this->data = Thot::where('pin_id', '=', $parentId)
            ->get()
            ->toArray();
        return $this->getApiResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $parentId
     * @return \Illuminate\Http\Response
     */
    public function create($parentId)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $parentId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $parentId)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }

        $this->validator = Validator::make($request->all(), [
            "poster_name" => "nullable|string",
            "thot_text" => "required|string",
            "photo_url" => "nullable"
        ]);
        if ($this->validator->fails()) {
            return $this->getApiResponse(400, 'Validation errors');
        }

        $thot = new Thot;
        $thot->fill($request->all());
        $thot->pin_id = $parentId;

        // Upload to s3
        /*$image = $request->file('image');
        $image_file_name = $this->generateGUID() . '.' . $image->getClientOriginalExtension();
        $file_path = "/thoughts/$image_file_name";

        $s3 = Storage::disk('s3');
        $s3->put($file_path, file_get_contents($image), 'public');

        $thot->photo_url = Storage::url($file_path);*/
        $thot->save();

        $this->data = array(
            'thot_id' => $thot->thot_id
        );
        return $this->getApiResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $parentId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($parentId, $id)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $parentId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($parentId, $id)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $parentId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parentId, $id)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $parentId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($parentId, $id)
    {
        $pin = Pin::where('pin_id', '=', $parentId)
            ->first();
        if (empty($pin)) {
            return $this->getApiResponse(400, 'A pin with that id does not exist');
        }


    }
}
