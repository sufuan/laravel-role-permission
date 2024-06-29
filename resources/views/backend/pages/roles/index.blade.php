@extends('backend.layouts.master')

@section('admin-content')


<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                            Tables
                        </h1>
                        <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10 pb-10">
        <div class="card mb-4">
            <div class="card-header">Extended DataTables</div>
            <div class="card-body">
                <table id="datatablesSimple">
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
                                <span class="badge badge-info mr-1">
                                    {{ $perm->name }}
                                </span>
                                @endforeach
                            </td>
                            <td>
                                <!-- <button class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i class="fa-solid fa-pencil-alt"></i></button> -->
                                <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-icon mb-4">
            <div class="row g-0">
                <div class="col-auto card-icon-aside bg-primary"><i class="me-1 text-white-50" data-feather="alert-triangle"></i></div>
                <div class="col">
                    <div class="card-body py-5">
                        <h5 class="card-title">Third-Party Documentation Available</h5>
                        <p class="card-text">Simple DataTables is a third party plugin that is used to generate the demo table above. For more information about how to use Simple DataTables with your project, please visit the official documentation.</p>
                        <a class="btn btn-primary btn-sm" href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">
                            <i class="me-1" data-feather="external-link"></i>
                            Visit Simple DataTables Docs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatables/datatables-simple-demo.js') }}"></script>
@endsection