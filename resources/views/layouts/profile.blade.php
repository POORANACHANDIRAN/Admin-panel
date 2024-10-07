<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../admin/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../admin/assets/css/demo.css" rel="stylesheet" />

    <style>
        .main-content {
    margin-left: 0; /* Remove or set a smaller value to reduce the space */
    padding: 20px; /* Adjust padding for consistent spacing */
    margin-top: 10px; /* Add margin to control the spacing from the navbar */
}

.profile-header {
    background: #6f42c1; 
    color: white;
    border-radius: 5px;
    margin-bottom: 20px;
    margin-top: 10px; /* Adjust margin to control space between navbar and profile */
}


        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: -30px;
            border: 3px solid white;
        }

        .profile-label {
            font-weight: bold;
        }

        .profile-container {
            background-color: #FAF9F6;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="wrapper">
    @include('includes.admin.sidebar')
    <div class="main-panel">
        @include('includes.admin.head')
        <div class="content mt-4">
            <div class="container">
            <div class="pagetitle">
            <h3>Employee Profile</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>
                <div class="card">
                    <div class="card-header text-white" style="background-color: #9B59B6;">
                        <h4 class="mb-0">Employee Profile</h4>
                    </div>
                    <div class="card-body" style="background-color: #FAF9F6; padding-left: 15%;">
                        <div class="row">
                            <!-- First Row -->
                            <div class="col-md-6">
                                <p><strong>Employee ID:</strong> {{ $user->id }}</p>
                                <p><strong>First Name:</strong> {{ $user->first_name }}</p>
                                <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Age:</strong> {{ $user->age }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date of Birth:</strong> {{ $user->dob }}</p>
                                <p><strong>Department:</strong> {{ $user->department }}</p>
                                <p><strong>Position:</strong> {{ $user->position }}</p>
                                <p><strong>Hire Date:</strong> {{ $user->hire_date }}</p>
                                <p><strong>Salary:</strong> ${{ number_format($user->salary, 2) }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <!-- Second Row -->
                            <div class="col-md-12">
                                <p><strong>Address:</strong> {{ $user->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
