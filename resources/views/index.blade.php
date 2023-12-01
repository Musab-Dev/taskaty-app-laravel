@extends('layouts.app')
<div class="page-actions-container">
    <a class="page-action" href="{{ route('tasks.create') }}">+ Add New Task</a>
</div>

@section('title', 'Taskaty List')

@section('content')
    <table class="w-full mt-6 border-collapse">
        <thead>
            <tr>
                <th class="table-header">Task Title</th>
                <th class="table-header">Task Completed</th>
                <th class="table-header">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td class="table-cell">
                        <a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a>
                    </td>
                    <td class="table-cell">
                        @if ($task->is_completed)
                            Completed
                        @else
                            Not Completed
                        @endif
                    </td>
                    <td class="table-cell">
                        <a href="{{ route('tasks.show', ['task' => $task]) }}">
                            <div class="icon-action-button">
                                <i class="fa fa-eye"> Details</i>
                            </div>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="table-cell text-center" colspan="3">
                        <p>No tasks added</p>
                        <div class="mt-2">
                            <a class="page-action" href="{{ route('tasks.create') }}">+ Add New Task</a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $tasks->onEachSide(2)->links() }}
    </div>
@endsection
