<?php
session_start();

// Define the valid credentials by role
$accounts = [
    'admin' => [
        'admin' => 'Pass1234',
        'renmark' => 'Pogi1234'
    ],
    'content_manager' => [
        'pepito' => 'manaloto',
        'juan' => 'delacruz'
    ],
    'system_user' => [
        'pedro' => 'penduko'
    ]
];

$message = '';
$messageType = ''; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials based on the selected role
    if (isset($accounts[$role][$username]) && $accounts[$role][$username] === $password) {
        // Successful login - set session and welcome message
        $_SESSION['username'] = $username; 
        $message = "Welcome to the system, $username"; 
        $messageType = 'alert-info'; 
    } else {
        // Invalid credentials
        $message = 'Invalid Username/Password';
        $messageType = 'alert-danger'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFFFF;
        }

        .login-container {
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #F0F0F0FF;
            box-shadow: 0 4px 20px #B6B5B5FF;
        }

        .circle-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 login-container">
                <div class="text-center">
                    <?php if ($message): ?>
                        <div class="alert <?php echo $messageType; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <img src="/assets/images/profile.jpg" alt="Logo" class="circle-image">
                    <h4>Sign In</h4>
                </div>
                <form method="POST" action="">
                    <div class="form-group">
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="content_manager">Content Manager</option>
                            <option value="system_user">System User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User Name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
