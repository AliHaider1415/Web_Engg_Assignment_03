<x-app-layout>

    <div class="container mt-5">
        <!-- Large and Bold Heading -->
        <h2 class="display-6 font-weight-bold text-center">Create New Training</h2>

        <!-- Display Success or Error message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('trainings.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="trainer" class="form-label">Trainer</label>
                <input type="text" class="form-control" id="trainer" name="trainer" required>
            </div>

            <div class="mb-3">
                <label for="fees" class="form-label">Fees</label>
                <input type="number" class="form-control" id="fees" name="fees" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <div class="mb-3">
                <label for="mode" class="form-label">Mode of Training</label>
                <select class="form-control" id="mode" name="mode" required>
                    <option value="" disabled selected>Select Mode</option>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location">
                <small class="form-text text-muted">Required only for offline or hybrid mode.</small>
            </div>

            <div class="mb-3">
                <label for="max_participants" class="form-label">Maximum Participants</label>
                <input type="number" class="form-control" id="max_participants" name="max_participants" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Training</button>
        </form>
    </div>

</x-app-layout>
