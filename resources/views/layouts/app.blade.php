<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskaty App | {{ $page_title }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/tailwindcss">
        .page-title {
            @apply text-5xl font-bold tracking-wide capitalize my-4
        }

        .page-actions-container {
            @apply container mx-auto my-5
        }

        .page-action {
            @apply text-xs rounded p-1 border border-slate-300 hover:border-slate-700 transition-all
        }

        .time-card {
            @apply border rounded p-1 bg-slate-50 font-mono
        }

        .task-status {
            @apply text-sm my-2
        }

        .form-actions {
            @apply my-4
        }

        .primary-btn {
            @apply rounded-lg p-2 bg-slate-400 text-white hover:bg-slate-500 transition-all duration-300
        }

        .primary-btn-outline {
            @apply rounded-lg p-2 border border-slate-400 text-slate-700 hover:bg-slate-400 hover:text-white hover:border-none transition-all duration-300
        }

        .danger-btn {
            @apply rounded-lg p-2 bg-red-500 text-white
        }

        .danger-btn-outline {
            @apply rounded-lg p-2 border border-red-500 text-red-700 hover:bg-red-700 hover:text-white hover:border-none transition-all duration-200
        }

        .error-message {
            @apply font-light text-sm text-red-900
        }

        .table-header {
            @apply p-2 border border-slate-400 bg-slate-100
        }

        .table-cell {
            @apply p-2 border border-slate-400 hover:bg-slate-100
        }

        .icon-action-button {
            @apply flex items-center justify-center border border-slate-300 rounded-full p-1
        }

        .input-field {
            @apply border border-slate-300 rounded p-2
        }

        .flash-message {
            @apply p-4 border border-slate-300 bg-slate-100 rounded mb-4
        }

        .flash-message-title {
            @apply font-bold text-slate-900
        }

        .flash-message-body {
            @apply text-slate-700
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <h1 class="page-title">@yield('title')</h1>

        @if (session()->has('success'))
            <div class="flash-message">
                <div class="flash-message-title">Success!</div>
                <div class="flash-message-body">{{ session('success') }}</div>
            </div>
        @endif

        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>
