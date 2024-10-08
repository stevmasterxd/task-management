@extends('layouts.base')

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