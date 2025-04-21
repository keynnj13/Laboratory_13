<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <div class="ms-auto">
                <form method="POST" action="/logout" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-1">Welcome, {{ auth()->user()->name }}!</h3>
                        <p class="card-text text-muted mb-0">You are logged in as <strong>{{ auth()->user()->email }}</strong></p>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h4 mb-0">Your Blogs</h1>
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> New Post
                    </a>
                </div>

                @forelse($blogs as $blog)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">{{ $blog->title }}</h4>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->body, 100) }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info text-center">
                    You have not created any blogs yet.
                </div>
                @endforelse

            </div>
        </div>
    </div>
</body>

</html>