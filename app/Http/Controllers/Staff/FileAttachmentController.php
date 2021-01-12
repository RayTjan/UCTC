<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\FileAttachment;
use App\Models\Task;
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
    public function create($id)
    {
        $task = Task::findOrFail($id);
        dd($task->id);
        return view('2ndRoleBlades.addAttachment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambahin code untuk complete task

        FileAttachment::create($request->all());
        return redirect()->route('staff.program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('2ndRoleBlades.addAttachment', compact('task'));
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
