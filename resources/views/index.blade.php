@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Task Management</h2>
        </div>
        <div>
            <a href="" class="btn btn-primary">Create Task</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{ session::get('success') }}<br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Task</th>
                <th>Description</th>
                <th>date</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            @foreach ($tasks as $task)
            <tr>
                <td class="fw-bold">{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    {{ $task->due_date }}
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{ $task->status }}</span>
                </td>
                <td>
                    <a href="" class="btn btn-warning">edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">eliminate</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
        {{ $tasks->links() }}
    </div>
</div>
@endsection