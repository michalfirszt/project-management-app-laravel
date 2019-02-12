<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, Project  $project)
    {
        $data = $request->only('title');
        
        try {

            $task = new Task();
            $task->title = $data['title'];

            $project->tasks()
                    ->save($task);

        } catch (\Exception $e) {

            flash('Error: ' . $e->getMessage())->error();

            return redirect()->back();
        }

        flash('Task <strong>' . $task->title . '</strong> created successfully')->success();

        return redirect()->route('project.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show')->withTask($task);
    }

    public function toggle(Task $task)
    {
        $task->toggle();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
