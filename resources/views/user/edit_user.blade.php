@extends('layouts.master')

@section('content')
<div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="mb-4">
                        <h5 class="card-title mb-0">Edit Data user</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('users.update', $users->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="judul" class="form-label">Name:</label>
                                <input type="text" name="judul" class="form-control" value="{{ $users->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $users->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="roles" >Role:</label>
                                <select class="form-control" id="roles" name="roles[]" multiple required>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection