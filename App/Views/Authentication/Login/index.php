<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background style */
        body {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            /* Purple to blue gradient */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        /* Centered login card */
        .login-card {
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

        /* Login button */
        .btn-login {
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

        /* Hover effect for login button */
        .btn-login:hover {
            background-color: #8f94fb;
        }

        /* Register link */
        .register-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            color: #6c757d;
        }

        /* Heading style */
        .login-heading {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Responsive for smaller screens */
        @media (max-width: 576px) {
            .login-card {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- Login Card -->
    <div class="login-card">
        <h2 class="login-heading">Login</h2>
        <form action="index.php?url=auth/login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <a href="index.php?url=auth/register" class="register-link">Don't have an account? Register</a>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>