@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="card">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="task_name">Task Name</label>
            <input type="text" name="task_name" id="task_name" value="{{ old('task_name', $task->task_name) }}" required>

            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4">{{ old('description', $task->description) }}</textarea>

            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date"
                   value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">

            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn" style="background:#7f8c8d;">Cancel</a>
        </form>
    </div>
@endsection
