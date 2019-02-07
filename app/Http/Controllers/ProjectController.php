<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('project.index')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->only('title', 'description');

        try {
            
            $project = Project::create([
                'title' => $data['title'],
                'description' => $data['description']
            ]);

        } catch (\Exception $e) {

            flash('Error: ' . $e->getMessage())->error();

            return redirect()->back();
        }

        flash('Project ' . $project->title . ' created successfully')->success();

        return redirect()->route('project.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show')->withProject($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit')->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->only('title', 'description');

        try {
            
            $project->update([
                'title' => $data['title'],
                'description' => $data['description']
            ]);

        } catch (\Exception $e) {

            flash('Error: ' . $e->getMessage())->error();

            return redirect()->back();
        }

        flash('Project ' . $project->title . ' changed successfully')->success();

        return redirect()->route('project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();

        } catch (\Exception $e) {

            flash('Error: ' . $e->getMessage())->error();

            return redirect()->back();
        }

        flash('Project ' . $project->title . ' deleted successfully')->success();

        return redirect()->route('project.index');
    }
}
