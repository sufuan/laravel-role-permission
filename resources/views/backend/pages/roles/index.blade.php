@extends('backend.layouts.master')

@section('admin-content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                    Extended DataTables
                </h1>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card mb-4">
            <div class="card-header">Extended DataTables</div>
            <div class="card-body">
                <table id="datatablesSimple" class="display">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $perm)
                                <span class="badge bg-info text-dark mr-1">
                                    {{ $perm->name }}
                                </span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa-solid fa-pencil-alt"></i></a>
                                @if (Auth::guard('admin')->user()->can('admin.edit'))
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('admin.roles.destroy', $role->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection