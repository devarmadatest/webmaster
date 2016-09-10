<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;
use App\Task;

class TasksController extends Controller {

    public function index(Project $project) {
        return view('tasks.index', compact('project'));
    }

    public function create(Project $project) {
        return view('tasks.create', compact('project'));
    }

    public function destroy(Project $project, Task $task) {
        return view('tasks.destroy');
    }

    public function edit(Project $project, Task $task) {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function show(Project $project, Task $task) {
        return view('tasks.show', compact('project', 'task'));
    }

    public function update(Project $project, Task $task) {
        return view('tasks.update');
    }

    public function store() {
        //
    }

}
