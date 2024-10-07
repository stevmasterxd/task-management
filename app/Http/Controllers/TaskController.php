<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function index(): view
    {
        $tasks = task::latest()->paginate(4);
        return view('index', ['tasks' => $tasks]);
    }

    public function create(): view
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date',
        ]);

        task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }


    public function show(task $task) 
    {

    }

    public function edit(Task $task): View
    {
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, task $task): RedirectResponse 
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date',
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'New updated task');
    }


    public function destroy(task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'The task was successfully deleted');
    }
}
