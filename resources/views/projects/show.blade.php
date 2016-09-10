@extends('app')

@section('content')
<h2>{{ $project->name }}</h2>

@if ( !$project->tasks->count() )
Your project has no tasks.
@else
<ul>
    @foreach( $project->tasks as $task )
    <li><a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}">{{ $task->name }}</a></li>
    @endforeach
</ul>
@endif
@endsection