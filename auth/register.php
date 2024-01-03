<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(255, 255, 255);
        }

        .container {
            margin-top: 50px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border-radius: 8px;
            border-color: black;
            /* Add rounded corners */
        }

        /* Add rounded corners for the button */
        form button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: #007bff;
            /* Change button color */
            color: #fff;
            /* Change text color */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Staff Registration</h1>

        <form method="post" action="process.php?register=true">
            <label for="username">User ID:</label>
            <input type="text" name="user_id" pattern="U\d{3}" title="User ID should be in the format U001" class="form-control" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>

            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" class="form-control" required>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" class="form-control" required>
                       
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" required>

            <label for="password">Password:</label>
            <input type="password" name="password" minlength="8" class="form-control" required>

            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>

</body>

</html>