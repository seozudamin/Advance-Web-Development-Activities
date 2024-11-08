<?php
session_start();

// Clear all session data on initial load
if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;
    $_SESSION['show_results'] = false;
    $_SESSION['firstName'] = '';
    $_SESSION['lastName'] = '';
    $_SESSION['age'] = '';
    $_SESSION['gender'] = '';
    $_SESSION['course'] = '';
    $_SESSION['email'] = '';
    $_SESSION['prelim'] = '';
    $_SESSION['midterm'] = '';
    $_SESSION['finals'] = '';
    $_SESSION['average'] = '';
    $_SESSION['status'] = '';
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_student'])) {
        // Store student details in session variables
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['course'] = $_POST['course'];
        $_SESSION['email'] = $_POST['email'];

        // Hide results display and enable grade form
        $_SESSION['show_results'] = false;
        $_SESSION['show_grade_form'] = true;
    } elseif (isset($_POST['btnRegister2'])) {
        // Retrieve grades
        $prelim = $_POST['prelim'];
        $midterm = $_POST['midterm'];
        $finals = $_POST['finals'];

        // Calculate average
        $average = round(($prelim + $midterm + $finals) / 3, 2);
        $status = $average >= 75 ? "Passed" : "Failed";

        // Store grades and results
        $_SESSION['prelim'] = $prelim;
        $_SESSION['midterm'] = $midterm;
        $_SESSION['finals'] = $finals;
        $_SESSION['average'] = $average;
        $_SESSION['status'] = $status;

        // Show results display
        $_SESSION['show_results'] = true;

        // Reset the grade form flag
        unset($_SESSION['show_grade_form']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prelim Exam</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/prelim.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h1>Welcome</h1>
                <img src="/assets/images/DCTLOGO.jpg" alt="">
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link disabled <?php echo !isset($_SESSION['show_grade_form']) ? 'active' : ''; ?>"
                            id="home-tab" data-toggle="tab" href="#home" role="tab">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled <?php echo isset($_SESSION['show_grade_form']) ? 'active' : ''; ?>"
                            id="profile-tab" data-toggle="tab" href="#profile" role="tab">Grade</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Student Enrollment Form -->
                    <div class="tab-pane fade <?php echo !isset($_SESSION['show_grade_form']) ? 'show active' : ''; ?>"
                        id="home" role="tabpanel">
                        <h3 class="register-heading">Student Enrollment Form</h3>
                        <form method="POST">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *"
                                            name="firstName" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name *"
                                            name="lastName" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Age *" name="age"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Course *" name="course"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="male" checked> <span> Male
                                                </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="female"> <span> Female </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" name="email"
                                            required />
                                    </div>
                                    <input type="submit" class="btnRegister" name="submit_student" value="Next" />
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Grade Form -->
                    <?php if (isset($_SESSION['show_grade_form'])): ?>
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <h3 class="register-heading">Enter Grades <?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></h3>
                            <form method="POST">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Prelim *" name="prelim"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Midterm *" name="midterm"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Finals *" name="finals"
                                                required />
                                        </div>
                                    </div>
                                    <input type="submit" class="btnRegister2" name="btnRegister2" value="Register" />
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Display -->
    <?php if ($_SESSION['show_results']): ?>
        <div class="p-4 rounded shadow mt-4 text-center mx-auto" id="results" style="max-width: 600px;">
            <h2>Student Details</h2>
            <p>First Name: <?php echo $_SESSION['firstName']; ?></p>
            <p>Last Name: <?php echo $_SESSION['lastName']; ?></p>
            <p>Age: <?php echo $_SESSION['age']; ?></p>
            <p>Gender: <?php echo ucfirst($_SESSION['gender']); ?></p> <!-- Added Gender -->
            <p>Course: <?php echo $_SESSION['course']; ?></p>
            <p>Email: <?php echo $_SESSION['email']; ?></p>

            <h2 class=" mt-4">Grades Summary</h2>
            <p>Prelim: <?php echo $_SESSION['prelim']; ?></p>
            <p>Midterm: <?php echo $_SESSION['midterm']; ?></p>
            <p>Finals: <?php echo $_SESSION['finals']; ?></p>
            <p><strong>Average:</strong> <?php echo $_SESSION['average']; ?>
                <span class="<?php echo $_SESSION['status'] == 'Passed' ? 'text-success' : 'text-danger'; ?>">
                    (<?php echo $_SESSION['status']; ?>)
                </span>
            </p>
        </div>
    <?php endif; ?>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>