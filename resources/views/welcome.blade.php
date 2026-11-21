<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

<h1>Today's Tasks</h1>

<a href="/">Dashboard</a> |
<a href="/tasks">Task List</a> |
<a href="/profile">Profile</a> |
<a href="/about">About</a> |
<a href="/tasks/create">Create Task</a> |
<a href="/register">Register</a> |
<hr>

@forelse($tasks as $task)
    <p>
        <strong>{{ $task->title }}</strong><br>
        Status: {{ $task->status }}<br>
        Date: {{ $task->task_date }}
    </p>
    <hr>
@empty
    <p>No tasks for today.</p>
@endforelse

</body>
</html>