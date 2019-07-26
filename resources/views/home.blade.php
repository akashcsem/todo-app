@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->name}}</td>
                        <td><a style="float: right;" class="btn btn-danger mr-10"
                                href="{{url('task/delete')}}/{{$task->id}}">Delete</a></td>
                        <td><a class="btn btn-primary" style="float: right;"
                                href="{{url('task/edit')}}/{{$task->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection