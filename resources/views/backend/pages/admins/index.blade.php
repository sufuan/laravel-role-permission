@extends('backend.layouts.master')

@section('admin-content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        @include('backend.layouts.partials.messages')

        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <!-- Optional content can be added here -->
            </div>
        </div>
    </header>



    <!-- Main page content -->
    <div class="container-xl px-4 mt-n10 pb-10">
        <div class="card mb-4">
            <div class="card-header">Admins List</div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img class="avatar-img img-fluid" src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}" alt="Admin Avatar" />
                                    </div>
                                    {{ $admin->name }}
                                </div>
                            </td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @foreach($admin->roles as $role)
                                <span class="badge badge-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                            <td>
                                @if (Auth::guard('admin')->user()->can('admin.edit'))
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('admin.admins.edit', $admin->id) }}">
                                    <i data-feather="edit"></i>
                                </a>
                                @endif
                                @if (Auth::guard('admin')->user()->can('admin.delete'))
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{ route('admin.admins.destroy', $admin->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                    <i data-feather="trash-2"></i>
                                </a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: none;">
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