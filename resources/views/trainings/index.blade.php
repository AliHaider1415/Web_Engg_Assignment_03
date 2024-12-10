<x-app-layout>
    <div class="container my-5">

        <div class="text-center mb-4 header">
            <h1>All Trainings</h1>

            <div class="btn-section">
                <a href="{{ route('trainings.create') }}" class="btn btn-primary custom-primary-btn">Create Training</a>
            </div>

        </div>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($trainings->isEmpty())
            <div class="alert alert-warning">
                No trainings available.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($trainings as $training)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $training->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($training->description, 100) }}
                                </p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Trainer:</strong> {{ $training->trainer }}</li>
                                    <li class="list-group-item"><strong>Duration:</strong> {{ $training->duration }}</li>
                                    <li class="list-group-item"><strong>Fees:</strong> ${{ $training->fees }}</li>
                                    <li class="list-group-item"><strong>Mode:</strong> {{ ucfirst($training->mode) }}</li>
                                    <li class="list-group-item"><strong>Location:</strong> {{ $training->location ?? 'N/A' }}</li>
                                    <li class="list-group-item"><strong>Start Date:</strong> {{ $training->start_date }}</li>
                                    <li class="list-group-item"><strong>End Date:</strong> {{ $training->end_date }}</li>
                                </ul>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTrainingModal" onclick="populateModal({{ json_encode($training) }})">
                                    Edit
                                </button>

                                <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Edit Training Modal -->
    <div class="modal fade" id="editTrainingModal" tabindex="-1" aria-labelledby="editTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTrainingModalLabel">Edit Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTrainingForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <div class="modal-body">
                        <!-- Input fields -->
                        <input type="hidden" id="trainingId" name="id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="trainer" class="form-label">Trainer</label>
                            <input type="text" class="form-control" id="trainer" name="trainer" required>
                        </div>
                        <div class="mb-3">
                            <label for="fees" class="form-label">Fees</label>
                            <input type="number" class="form-control" id="fees" name="fees" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="mode" class="form-label">Mode</label>
                            <select class="form-control" id="mode" name="mode" required>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3">
                            <label for="max_participants" class="form-label">Max Participants</label>
                            <input type="text" class="form-control" id="max_participants" name="max_participants">
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        h1 {
            font-size: 2.5rem;
            color: #7F3FBF;
            margin-bottom: 20px;
        }

        .header, .btn-section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header {
            justify-content: space-between;
        }

        .custom-primary-btn {
            background-color: #7F3FBF !important;
            color: white !important;
            border: none !important;
        }

        .custom-primary-btn:hover {
            background-color: #6A32A3 !important;
        }

        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script>
        // Populate modal fields with training data
        function populateModal(training) {
            const form = document.getElementById('editTrainingForm');
            form.action = `/trainings/${training.id}`; // Set form action to the update route
            document.getElementById('trainingId').value = training.id;
            document.getElementById('title').value = training.title;
            document.getElementById('description').value = training.description;
            document.getElementById('trainer').value = training.trainer;
            document.getElementById('fees').value = training.fees;
            document.getElementById('duration').value = training.duration;
            document.getElementById('mode').value = training.mode;
            document.getElementById('location').value = training.location;
            document.getElementById('max_participants').value = training.max_participants;
            document.getElementById('start_date').value = training.start_date;
            document.getElementById('end_date').value = training.end_date;
        }
    </script>
</x-app-layout>
