@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Roles and Permission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Manage Role and Permission</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Roles and Permission</h4>
                </div>
                <form action="{{ route('assign.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Roles</label>
                            <select name="role" class="form-control select2">
                                <option value="">Choose Role</option>
                                @foreach ($roles as $item)
                                    <option {{ $role->id === $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Permission</label>
                            <select name="permissions[]" class="form-control select2" multiple>
                                @foreach ($permissions as $permission)
                                    <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }}
                                        value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('assign.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
