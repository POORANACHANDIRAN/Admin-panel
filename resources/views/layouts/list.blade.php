<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User List</title>

    <!-- Additional Links and Meta Tags -->
    <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../admin/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/assets/css/light-bootstrap-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link href="../admin/assets/css/demo.css" rel="stylesheet" />

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<div class="wrapper">
    @include('includes.admin.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('includes.admin.head')
        <!-- End Navbar -->

        <div class="container mt-4">
            <h2 class="mb-4">User List</h2>
            <a href="{{ Route('form') }}" class="btn btn-info text-success mb-2">Add User</a>

            <!-- Display success message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>DOB</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $counter = 1; @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{ route('profile', $user->id) }}" class="btn btn-success">View</a>
                                <a href="{{ route('edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $user->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- JavaScript for Delete Functionality -->
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var userId = $(this).data('id');
        var $row = $(this).closest('tr');

        // SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform AJAX request for deletion
                $.ajax({
                    url: '/users/delete/' + userId,
                    type: 'DELETE', // Use DELETE request method
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            $row.remove(); // Remove the row from the table
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted successfully.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the user.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'An error occurred while trying to delete the user.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>

</body>
</html>
