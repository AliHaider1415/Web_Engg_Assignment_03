@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Training</h1>

        <form action="{{ route('trainings.update', $training->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $training->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $training->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="trainer">Trainer</label>
                <input type="text" class="form-control" id="trainer" name="trainer" value="{{ $training->trainer }}" required>
            </div>

            <div class="form-group">
                <label for="fees">Fees</label>
                <input type="number" step="0.01" class="form-control" id="fees" name="fees" value="{{ $training->fees }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ $training->duration }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $training->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $training->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="mode">Mode</label>
                <select class="form-control" id="mode" name="mode" required>
                    <option value="online" {{ $training->mode == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ $training->mode == 'offline' ? 'selected' : '' }}>Offline</option>
                    <option value="hybrid" {{ $training->mode == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $training->location }}" placeholder="Location for offline or hybrid mode">
            </div>

            <div class="form-group">
                <label for="max_participants">Max Participants</label>
                <input type="number" class="form-control" id="max_participants" name="max_participants" value="{{ $training->max_participants }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Training</button>
        </form>
    </div>
@endsection
