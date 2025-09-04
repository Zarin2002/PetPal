

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow text-center">
                <div class="card-header">

                    <!-- User Icon Avatar -->
                    <div class="d-flex justify-content-center mb-2">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 30px;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>

                    <h4>My Account</h4>
                </div>
                <div class="card-body text-start">

                    <!-- Full Name -->
                    <div class="mb-3 p-3 border rounded bg-light">
                        <span class="fw-bold">Full Name:</span> {{ $user->name }}
                    </div>

                    <!-- Email -->
                    <div class="mb-3 p-3 border rounded bg-light">
                        <span class="fw-bold">Email:</span> {{ $user->email }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap Icons CDN if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection








