@extends('app')

@section('content')
<h2>Edit Project</h2>
{!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->id]]) !!}
@include('projects/partials/_form', ['submit_text' => 'Edit Project'])
{!! Form::close() !!}   
@endsection