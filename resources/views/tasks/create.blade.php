<form method="POST" action="/tasks">
    @csrf

    <input type="text"
           name="title"
           value="{{ old('title') }}">

    @error('title')
        <p>{{ $message }}</p>
    @enderror

    <input type="date"
           name="task_date">

    <select name="status">
        <option value="pending">Pending</option>
        <option value="done">Done</option>
    </select>

    <button type="submit">
        Save Task
    </button>
</form>