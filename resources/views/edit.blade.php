@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Edit Task</h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>¡An error occurred while saving the task!</strong> Error<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Task:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Task" value="{{$task->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description...">{{ $task->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Deadline:</strong>
                    <input type="date" name="due_date" class="form-control" value={{ $task->due_date }} id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Status (initial):</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Choose the status --</option>
                        <option value="pending" @selected("pending"==$task->status) >pending</option>
                        <option value="in progress" @selected("in progress"==$task->status)>in progress</option>
                        <option value="completed" @selected("completed"==$task->status)>completed</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('content')

<h1>{{ $task->title }}</h1>
<p>{{ $task->description }}</p>
<p>{{ $task->due_date }}</p>

<h2>comments</h2>
<ul>
    @foreach($task->comments as $comment)
    <li>{{ $comment->content }} - <small>{{ $comment->created_at }}</small></li>
    @endforeach
</ul>

<form action="{{ route('tasks.storeComment', $task->id) }}" method="POST">
    @csrf
    <div>
        <label for="content">New Comment:</label>
        <textarea name="content" id="content" required></textarea>
    </div>
    <button type="submit">Add Comment</button>
</form>

@endsection