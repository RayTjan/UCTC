<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActionPlan;
use App\Models\FileAttachment;
use App\Models\Program;
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
        return view('3rdRoleBlades.addAttachment', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::findOrFail($request->idTask);
        $task->update([
            'status' => $request->status,
        ]);

        //call program
        $action = ActionPlan::findOrFail($task->action_plan);

        FileAttachment::create([
            'name' => $request->name,
            'file_attachment' => $request->file_attachment,
            'program' => $action->program,
        ]);
        return redirect()->route('student.actionTask.show', $task->action_plan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('3rdRoleBlades.listFileAttachment', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = FileAttachment::findOrFail($id);
        return view('3rdRoleBlades.editAttachment', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = FileAttachment::findOrFail($id);
        $file->update($request->all());
        return redirect(route('student.file.show', $request->program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileAttachment  $fileAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = FileAttachment::findOrFail($id);
        $file->delete();
        return redirect(route('student.file.show', $file->program));
    }
}
