@extends('layouts.owner.app')
@section('content')
<style>
    .container {
        font-family: 'Roboto', sans-serif;
        max-width: 900px;
        margin: auto;
        padding: 20px;
    }

    .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background-color:rgb(180, 180, 180);
        color: #fff;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .btn-danger {
        background-color:rgb(48, 45, 45);
        color: #fff;
        border: none;
        transition: background-color 0.3s;
    }

    .btn-danger:hover {
        background-color:rgb(36, 36, 36);
    }

    .btn_i.black_btn {
        background-color: #23272b;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s;
        text-transform: uppercase;
    }

    .btn_i.black_btn:hover {
        background-color: #23272b;
    }

    .card-body {
        padding: 20px;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    label {
        display: flex;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .text-danger {
        font-size: 13px;
        color:rgb(26, 26, 26);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 10px;
    }

    .col-md-2 {
        flex: 1 1 calc(20% - 15px);
        min-width: 150px;
        text-align: left;
    }

    input[type="checkbox"] {
        margin-right: 8px;
        transform: scale(1.2);
        vertical-align: middle;
    }

    .alert {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <span>Role: {{ $role->name }}</span>
                    <a href="{{ url('roles') }}" class="btn btn-danger">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label>Permissions</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-md-2">
                                    <label>
                                        <input
                                            type="checkbox"
                                            name="permission[]"
                                            value="{{ $permission->name }}"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                        />
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn_i black_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection