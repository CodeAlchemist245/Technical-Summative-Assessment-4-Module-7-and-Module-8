<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<h1>Edit Task</h1>

<form method="POST" action="/tasks/{{ $task->id }}">
    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ old('title', $task->title) }}"
    >

    <input
        type="date"
        name="task_date"
        value="{{ old('task_date', $task->task_date) }}"
    >

    <select name="status">
        <option value="pending"
            {{ $task->status == 'pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="done"
            {{ $task->status == 'done' ? 'selected' : '' }}>
            Done
        </option>
    </select>

    <button type="submit">
        Update Task
    </button>

</form>

</body>
</html>