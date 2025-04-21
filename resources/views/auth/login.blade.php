@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="/register" class="text-decoration-none">Don't have an account? Register</a>
            </div>
        </div>
    </div>
</div>
@endsection