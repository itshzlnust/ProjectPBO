<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background and basic style */
        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            /* Pink to blue gradient */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        /* Centered register card */
        .register-card {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Form input styles */
        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Register button */
        .btn-register {
            background-color: #4e54c8;
            color: #fff;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        /* Hover effect for register button */
        .btn-register:hover {
            background-color: #8f94fb;
        }

        /* Login link */
        .login-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: #6c757d;
        }

        /* Heading style */
        .register-heading {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Responsive for smaller screens */
        @media (max-width: 576px) {
            .register-card {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- Register Card -->
    <div class="register-card">
        <h2 class="register-heading">Register</h2>
        <form action="index.php?url=auth/register" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="btn btn-register">Register</button>
            <a href="index.php?url=auth/login" class="login-link">Already have an account? Login</a>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>