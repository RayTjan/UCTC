<?php

namespace App\Http\Controllers\Admin;

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
        return view('2ndRoleBlades.addAttachment', compact('task'));
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
        $program = Program::findOrFail($action->program);

        FileAttachment::create([
            'name' => $request->name,
            'file_attachment' => $request->file_attachment,
            'program' => $program->id,
        ]);
        return redirect()->route('admin.actionTask.show', $task->action_plan);
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
        return view('2ndRoleBlades.listFileAttachment', compact('program'));
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
        return view('2ndRoleBlades.editAttachment', compact('file'));
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
        return redirect(route('admin.file.show', $request->program));
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
        return redirect(route('admin.file.show', $file->program));
    }
}
