<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Volunteers</title>
</head>

<body>

    <h1>Pending Volunteers</h1>

    @foreach ($volunteers as $volunteer)
    <div>
        <p>Name: {{ $volunteer->name }}</p>
        <p>Email: {{ $volunteer->email }}</p>
        <form action="{{ route('admin.volunteers.approve', $volunteer->id) }}" method="POST">
            @csrf
            <button type="submit">Approve</button>
        </form>
    </div>
    @endforeach
</body>

</html>