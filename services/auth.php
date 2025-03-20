<?php

session_start();

include "db.php";

if (isset($_POST["register"])) {
    // Get and trim all the user's credentials
    $first_name = trim($_POST["first_name"]);
    $middle_name = trim($_POST["middle_name"]);
    $last_name = trim($_POST["last_name"]);
    $gender = trim($_POST["gender"]);
    $date_of_birth = trim($_POST["date_of_birth"]);
    $phone_number = trim($_POST["phone_number"]);
    $user_name = trim($_POST["user_name"]);
    $email_address = trim($_POST["email_address"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Check if the password is confirmed
    if ($password === $confirm_password) {
        // Hash the password with bcrypt algorithm
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Concatenate the name
        if (!$middle_name) {
            $name = $first_name . ' ' . $last_name;
        } else {
            $name = $first_name . ' ' . $middle_name . ' ' . $last_name;
        }

        // Insert the user in the database
        $query = "INSERT INTO users (name, gender, date_of_birth, phone_number, user_name, email_address, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind the parameters
        $statement = $conn->prepare($query);
        $statement->bind_param("sssssss", $name, $gender, $date_of_birth, $phone_number, $user_name, $email_address, $hashed_password);

        // Execute the statement
        if ($statement->execute()) {
            // Show success message then redirect to login page
            echo "<script>
                alert('Registered successfully! Please log in to continue.');
                window.location.href='../pages/login.php';
            </script>";
            exit();
        } else {
            // Display error if failed
            echo "Error: " . $statement->error;
        }
    } else {
        // Display error if passwords do not match
        echo "<script>
            alert('Passwords do not match!');
            window.location.href='../pages/register.php';
        </script>";
    }
}

if (isset($_POST["login"])) {
    // Get and trim all the user's credentials
    $email_address = trim($_POST["email_address"]);
    $password = trim($_POST["password"]);

    // Prepare, Bind, and Execute the statement
    $query = "SELECT email_address, password FROM users WHERE email_address = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("s", $email_address);
    $statement->execute();
    $statement->store_result();

    // Check if a user exists with the provided email
    if ($statement->num_rows > 0) {
        $statement->bind_result($db_email, $db_password);
        $statement->fetch();

        // Verify the hashed password
        if (password_verify($password, $db_password)) {
            // Store email in the session
            $_SESSION["email"] = $db_email;

            // Show success message then redirect to home page
            echo "<script>
                alert('Logged in successfully!');
                window.location.href='../index.php?home';
            </script>";

            exit();
        } else {
            // Display error if password do not match on record
            echo "<script>
                alert('The credentials do not match our records. Please try again.');
                window.location.href='../pages/login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('User not found!'); 
            window.location.href='../pages/login.php';
        </script>";
    }
}

if (isset($_POST["logout"])) {
    session_start(); // Ensure the session is started
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    header("Location: ../pages/login.php"); // Redirect to login page
    exit(); // Stop further script execution
}
