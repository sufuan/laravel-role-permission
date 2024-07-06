<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.css">
</head>

@extends('backend.layouts.master')

@section('admin-content')
<div>
    <table id="table" data-toolbar="#toolbar" data-search='true' data-show-refresh="true" data-toggle="table" data-show-toggle="true" data-show-export="true" data-click-to-select="true" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-url="{{ url('admin/volunteers') }}" data-height="400" data-pagination="true" data-page-list="[2, 10, 50, 100, all]">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Item Name</th>
                <th data-searchable data-field="email">Email</th>
                <th data-field="phone">Phone</th>
                <th data-field="gender">Gender</th>
                <th data-field="department">Department</th>
                <th data-field="session">Session</th>
                <th data-field="skills">Skills</th>
                <th data-field="post_status" data-formatter="statusFormatter">Post Status</th>
            </tr>
        </thead>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.29.0/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.29.0/libs/jsPDF/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script>
    function statusFormatter(value, row, index) {
        var selectedPending = value === 'pending' ? 'selected' : '';
        var selectedPublished = value === 'published' ? 'selected' : '';
        return `
            <form onsubmit="return false;">
                <input type="hidden" name="id" value="${row.id}">
                <select name="post_status" class="form-control" onchange="updateStatus(this)">
                    <option value="pending" ${selectedPending}>Pending</option>
                    <option value="published" ${selectedPublished}>Published</option>
                </select>
            </form>
        `;
    }

    function updateStatus(selectElement) {
        var form = selectElement.closest('form');
        var id = form.querySelector('input[name="id"]').value;
        var post_status = selectElement.value;

        $.ajax({
            url: `{{ route('admin.volunteers.update_status', ['id' => ':id']) }}`.replace(':id', id),
            method: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}',
                post_status: post_status
            },
            success: function(response) {
                console.log('Status updated successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error updating status:', error);
            }
        });

    }
</script>
</body>

</html>
@endsection