@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Register</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="/login" class="text-decoration-none">Already have an account? Login</a>
            </div>
        </div>
    </div>
</div>
@endsection