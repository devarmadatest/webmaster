@extends('app')

@section('content')
<h2>
    {!! link_to_route('projects.show', $project->name, [$project->id]) !!} -
    {{ $task->name }}
</h2>

{{ $task->description }}
@endsection