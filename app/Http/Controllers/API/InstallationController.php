<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallationRequest;
use App\Http\Resources\InstallationResource;
use App\Models\Installation;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $installations = Installation::with(["client", "installator"])->get();
        return InstallationResource::collection($installations);
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
    public function store(InstallationRequest $request)
    {
        $installation = Installation::create($request->all());
        return new InstallationResource($installation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function show(Installation $installation)
    {
        $installation = Installation::where('id', $installation->id)->with(["client", "installator"])->first();
        return new InstallationResource($installation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function edit(Installation $installation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function update(InstallationRequest $request, Installation $installation)
    {
        $installation->update($request->all());
        return new InstallationResource($installation->with(["client", "installator"])->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installation $installation)
    {
        $installation->delete();
        return response(null, 204);
    }
}
