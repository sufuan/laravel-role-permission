@extends('backend.layouts.master')

@section('admin-content')
<div class="container">
    <h1>Event Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text"><strong>Start:</strong> {{ $event->start }}</p>
            <p class="card-text"><strong>End:</strong> {{ $event->end }}</p>
            <p class="card-text"><strong>All Day:</strong> {{ $event->is_all_day ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
            <p class="card-text"><strong>Countdown:</strong> {{ $event->countdown ? 'Enabled' : 'Disabled' }}</p>

            <a href="{{ route('events.editDetails', $event->id) }}" class="btn btn-primary">Edit Details</a>
        </div>
    </div>
</div>
@endsection