@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="card">
        <div class="top-bar">
            <h1>My Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-add">+ Add Task</a>
        </div>

        @if ($tasks->isEmpty())
            <div class="empty-state">
                <p>No tasks yet. Click "Add Task" to create your first one.</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td><strong>{{ $task->task_name }}</strong></td>
                            <td>{{ $task->description ?: '—' }}</td>
                            <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : '—' }}</td>
                            <td>
                                <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="actions">
                                <form action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-toggle">
                                        Mark as {{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}
                                    </button>
                                </form>

                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-edit">Edit</a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                      onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
