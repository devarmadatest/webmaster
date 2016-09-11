<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Task;

class TasksController extends Controller {

    protected $rules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required'],
        'description' => ['required'],
    ];

    public function index(Project $project) {
        return view('tasks.index', compact('project'));
    }

    public function create(Project $project) {
        return view('tasks.create', compact('project'));
    }

    public function destroy(Project $project, Task $task) {
        $task->delete();
        return Redirect::route('projects.show', $project->id)->with('message', 'Task deleted.');
    }

    public function edit(Project $project, Task $task) {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function show(Project $project, Task $task) {
        return view('tasks.show', compact('project', 'task'));
    }

    public function update(Project $project, Task $task, Request $request) {
        $this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
        $task->update($input);
        return Redirect::route('projects.tasks.show', [$project->id, $task->id])->with('message', 'Task updated.');
    }

    public function store(Project $project, Request $request) {
        $this->validate($request, $this->rules);
        $input = Input::all();
        $input['project_id'] = $project->id;
        Task::create($input);
        return Redirect::route('projects.show', $project->id)->with('message', 'Task created.');
    }

}
