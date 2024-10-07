<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

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
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../admin/assets/css/demo.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        .reduced-width {
            width: 85% !important; /* Reduce width by 15% */
        }
        .form-container {
            padding-left: 20px; /* Adds space on the left side */
        }
    </style>
</head>
<body>
<div class="wrapper">
        @include('includes.admin.sidebar');
        <div class="main-panel">
            <!-- Navbar -->
            @include('includes.admin.head');
            <!-- End Navbar -->

<!-- Form container with left padding -->
<div class="form-container">
    <form id="loginForm" action="{{Route('updateuser',$users->id)}}" method="POST">
        @csrf <!-- Ensure CSRF protection is in place -->

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleInputName" class="form-label">First Name</label>
                <input type="text" class="form-control reduced-width" id="exampleInputName" name="first_name" value="{{ $users->first_name}}" aria-describedby="nameHelp">
            </div>
            <div class="col-md-6">
                <label for="exampleInputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control reduced-width" id="exampleInputLastName" name="last_name" value="{{ $users->last_name}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control reduced-width" id="exampleInputEmail1" name="email" value="{{ $users->email}}" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6">
                <label for="exampleInputDOB" class="form-label">Date of Birth</label>
                <input type="date" class="form-control reduced-width" id="exampleInputDOB" name="dob" value="{{ $users->dob}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleInputAge" class="form-label">Age</label>
                <input type="number" class="form-control reduced-width" id="exampleInputAge" name="age" value="{{ $users->age}}" aria-describedby="ageHelp">
            </div>

            <div class="col-md-6">
                <label for="exampleInputSalary" class="form-label">Salary</label>
                <input type="number" class="form-control reduced-width" id="exampleInputSalary" name="salary" value="{{$users->salary}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleInputAddress" class="form-label">Address</label>
                <input type="text" class="form-control reduced-width" id="exampleInputAddress" name="address" value="{{ $users->address}}">
            </div>
            <div class="col-md-6">
                <label for="exampleInputDepartment" class="form-label">Department</label>
                <input type="text" class="form-control reduced-width" id="exampleInputDepartment" name="department" value="{{ $users->department}}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleInputPosition" class="form-label">Position</label>
                <input type="text" class="form-control reduced-width" id="exampleInputPosition" name="position" value="{{ $users->position}}">
            </div>
            <div class="col-md-6">
                <label for="exampleInputHireDate" class="form-label">Hire Date</label>
                <input type="date" class="form-control reduced-width" id="exampleInputHireDate" name="hiredate" value="{{ $users->hire_date}}">
            </div>
        </div>

        <div class="row mb-3">
            
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
</div>

</body>
</html>
