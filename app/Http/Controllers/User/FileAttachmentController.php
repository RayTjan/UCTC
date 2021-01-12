<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FileAttachment;
use Illuminate\Http\Request;

class FileAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('3rdRoleBlades.addAttachment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FileAttachment::create($request->all());
        return redirect()->route('staff.program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileAttachment $fileAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileAttachment $fileAttachment)
    {
        //
    }
}
