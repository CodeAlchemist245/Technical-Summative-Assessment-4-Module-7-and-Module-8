<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'task_date' => 'required|date',
            'status' => 'required'
        ]);

        Task::create($validated);

        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'task_date' => 'required|date',
            'status' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->update($validated);

        return redirect('/tasks');
    }
}