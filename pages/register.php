<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website | Register</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <main class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100dvh;">
        <form action="../services/auth.php" method="post">
            <h2 class="mb-4">Register</h2>
            <div class="row mb-3">
                <div class="col-sm-2 col-md-4">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="ex. Juan" required>
                </div>
                <div class="col-sm-2 col-md-4">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="ex. Dela (Optional)">
                </div>
                <div class="col-sm-2 col-md-4">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="ex. Cruz" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 col-md-4">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-sm-2 col-md-4">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                </div>
                <div class="col-sm-2 col-md-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone_number" id="phone_number"
                        placeholder="ex. 09123456789" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 col-md-6">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="ex. JuanDelaCruz123" required>
                </div>
                <div class="col-sm-2 col-md-6">
                    <label for="email_address" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email_address" id="email_address"
                        placeholder="ex. juandelacruz@example.com" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Enter Your Password" required>
                </div>
                <div class="col-sm-2 col-md-6">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        placeholder="Confirm Your Password" required>
                </div>
            </div>
            <p>
                Already have an account?
                <a href="login.php"> Login here.</a>
            </p>
            <input type="submit" class="btn btn-primary w-100" name="register" value="Register">
        </form>
    </main>
</body>

</html>