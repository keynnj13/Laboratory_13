<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>


<body class="p-4">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3>Welcome, {{ auth()->user()->name }}!</h3>
                <p>You are logged in as <strong>{{ auth()->user()->email }}</strong></p>

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="mb-4">All Blogs</h1>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Create New Post
        </a>

        @foreach($blogs as $blog)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $blog->title }}</h4>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->body, 100) }}</p>
                <a href="{{ route('blogs.show', $blog) }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i> View
                </a>
                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Delete
                    </button>

                </form>
            </div>
        </div>
        @endforeach

    </div>

</body>

</html>