@extends('backend.layouts.master')

@section('admin-content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <!-- Optional content can be added here -->
            </div>
        </div>
    </header>

    <!-- Main page content -->
    <div class="container-xl px-4 mt-n10 pb-10">
        <div class="card mb-4">
            <div class="card-header">Extended DataTables</div>
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
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img class="avatar-img img-fluid" src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}" alt="User Avatar" />
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ route('admin.users.edit', $user->id) }}">
                                    <i data-feather="edit"></i>
                                </a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{ route('admin.users.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                    <i data-feather="trash-2"></i>
                                </a>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables/datatables-simple-demo.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datatablesSimple = new simpleDatatables.DataTable("#datatablesSimple");
    });
</script>
@endsection