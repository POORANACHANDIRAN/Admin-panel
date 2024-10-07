<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
            width: 85%;
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
        <!-- <a href="add.html" class="btn btn-primary">Add</a>
        <a href="gallery/{value}/{type}" class="btn btn-primary">minus</a> -->

        <!-- <p>{{ session('message') }}</p> -->
        <form id="loginForm" action="{{url('/adduser') }}" method="POST" enctype="multipart/form-data" class="p-3 ms-4">
            @csrf <!-- Ensure CSRF protection is in place -->

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputName" class="form-label">First Name</label>
                    <input type="text" class="form-control reduced-width" id="exampleInputName" name="first_name" aria-describedby="nameHelp">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control reduced-width" id="exampleInputLastName" name="last_name">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control reduced-width" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control reduced-width" name="password" id="exampleInputPassword1">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputDOB" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control reduced-width" id="exampleInputDOB" name="dob">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputAge" class="form-label">Age</label>
                    <input type="number" class="form-control reduced-width" id="exampleInputAge" name="age" aria-describedby="ageHelp">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control reduced-width" id="exampleInputAddress" name="address">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputDepartment" class="form-label">Department</label>
                    <input type="text" class="form-control reduced-width" id="exampleInputDepartment" name="department">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputPosition" class="form-label">Position</label>
                    <input type="text" class="form-control reduced-width" id="exampleInputPosition" name="position">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputHireDate" class="form-label">Hire Date</label>
                    <input type="date" class="form-control reduced-width" id="exampleInputHireDate" name="hiredate">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleInputSalary" class="form-label">Salary</label>
                    <input type="number" class="form-control reduced-width" id="exampleInputSalary" name="salary" step="0.01">
                </div>
                <!-- <div class="col-md-6">
                    <label for="exampleInputProfilePicture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control reduced-width" id="exampleInputProfilePicture" name="profile_picture" accept="image/*">
                </div> -->
            </div>

            <div class="row mb-3">
                
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{Route('layouts.list')}}" class="btn btn-primary ">View Table</a>
        </form>
    </div>
</div>

<script>
    $("#loginForm").validate({
        rules: {
            name: { required: true },
            last_name: { required: true },
            email: { required: true, email: true },
            phone: { required: true, phoneUS: true },
            dob: { required: true, date: true },
            age: { required: true, number: true, min: 1 },
            address: { required: true },
            department: { required: true },
            position: { required: true },
            hiredate: { required: true, date: true },
            salary: { required: true, number: true, min: 0 },
            password: { required: true, minlength: 5 }
        },
        messages: {
            name: { required: "Please enter your first name" },
            last_name: { required: "Please enter your last name" },
            email: { required: "Please enter an email", email: "Please enter a valid email address" },
            phone: { required: "Please enter your phone number", phoneUS: "Please enter a valid phone number" },
            dob: { required: "Please enter your date of birth", date: "Please enter a valid date" },
            age: { required: "Please enter your age", number: "Please enter a valid number", min: "Age must be greater than 0" },
            address: { required: "Please enter your address" },
            department: { required: "Please enter your department" },
            position: { required: "Please enter your position" },
            hiredate: { required: "Please enter your hire date", date: "Please enter a valid date" },
            salary: { required: "Please enter your salary", number: "Please enter a valid number", min: "Salary must be greater than or equal to 0" },
            password: { required: "Please enter a password", minlength: "Password must be at least 5 characters long" }
        }
    });  
</script>

</body>
</html>
