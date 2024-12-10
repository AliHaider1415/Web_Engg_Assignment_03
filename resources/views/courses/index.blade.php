<x-app-layout>
    <div class="container my-5">

        <div class="text-center mb-4 header">
            <h1>All Courses</h1>

            <div class="btn-section">
                <button type="button" class="btn btn-primary custom-primary-btn">Create Course</button>
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

        @if($courses->isEmpty())
            <div class="alert alert-warning">
                No courses available.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Level</th>
                        <th scope="col">Price</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->duration }} hours</td>
                            <td>{{ $course->level }}</td>
                            <td>${{ $course->price }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            <td class="text-center">
                                <button 
                                    class="btn btn-link p-0" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editCourseModal" 
                                    onclick="populateModal({{ json_encode($course) }})" 
                                    title="Edit Course">
                                    <img src="{{ asset('images/edit.png') }}" alt="Edit" height="25" width="25">
                                </button>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete Course" style="background: none; border: none; cursor: pointer;">
                                    <img src="{{ asset('images/trash.png') }}" alt="Logo" height="25" width="25" class="mr-2">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


    <!-- Edit Course Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCourseForm" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <div class="modal-body">
                    <!-- Input fields -->
                    <input type="hidden" id="courseId" name="id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (hours)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
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

<script>
    // Populate modal fields with course data
    function populateModal(course) {
        const form = document.getElementById('editCourseForm');
        form.action = `/courses/${course.id}`; // Set form action to the update route
        document.getElementById('courseId').value = course.id;
        document.getElementById('title').value = course.title;
        document.getElementById('description').value = course.description;
        document.getElementById('duration').value = course.duration;
        document.getElementById('level').value = course.level;
        document.getElementById('price').value = course.price;
        document.getElementById('start_date').value = course.start_date;
        document.getElementById('end_date').value = course.end_date;
    }
</script>





    <style>
        /* Center icons */
        .text-center i {
            vertical-align: middle;
        }

        /* Hover effect for icons */
        .fa-edit:hover {
            color: #FFB84D; /* Lighter orange */
        }

        .fa-trash:hover {
            color: #FF4D4D; /* Lighter red */
        }


        h1 {
            font-size: 2.5rem;
            color: #7F3FBF;
            margin-bottom: 20px;
        }

        .header, .btn-section{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header{
            justify-content: space-between;
        }

        .custom-primary-btn{
            background-color: #7F3FBF !important;
            color: white !important;
            border: none !important;
        }

        .custom-primary-btn:hover{

        }

    </style>
</x-app-layout>
