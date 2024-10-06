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

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Task</th>
                <th>Description</th>
                <th>date</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            <tr>
                <td class="fw-bold">Estudiar Laravel</td>
                <td>Ver video: tu primer CRUD</td>
                <td>
                    03/03/24
                </td>
                <td>
                    <span class="badge bg-warning fs-6">earring</span>
                </td>
                <td>
                    <a href="" class="btn btn-warning">edit</a>

                    <form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">eliminate</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection