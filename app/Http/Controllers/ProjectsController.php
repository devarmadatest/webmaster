<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;

class ProjectsController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
    ];

    public function index() {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function destroy(Project $project) {
        $project->delete();
        return Redirect::route('projects.index')->with('message', 'Project deleted.');
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function show(Project $project) {
        return view('projects.show', compact('project'));
    }

    public function update(Project $project, Request $request) {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
        $project->update($input);
        return Redirect::route('projects.show', $project->id)->with('message', 'Project updated.');
    }

    public function store(Request $request) {
        $this->validate($request, $this->rules);
        $input = Input::all();
        Project::create($input);
        return Redirect::route('projects.index')->with('message', 'Project created');
    }

}
