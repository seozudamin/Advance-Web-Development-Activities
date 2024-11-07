<?php
// Function to check if the Grade tab should be disabled
function isGradeTabDisabled()
{
    // You can add your logic here to determine if the Grade tab should be disabled
    return true; // Return true to disable the tab initially
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prelim Exam</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/prelim.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script></script>
</head>

<body>

    <!--Navigation Tab-->
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#" role="tab"
                            aria-controls="profile" aria-selected="false" style="pointer-events: none;">Grade</a>
                    </li>
                </ul>
                <!--Student Enrollment Form-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Student Enrollment Form</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name *" id="first-name"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name *" id="last-name"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Age *" id="age" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Course *" id="course"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email"
                                        value="" />
                                </div>
                                <input type="submit" class="btnRegister" id="btnRegister" value="Next" disabled />
                            </div>
                        </div>
                    </div>
                    <!--Grade Form-->
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Enter Grades for Name</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Prelim *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Midterm *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Finals *" value="" />
                                </div>
                            </div>
                            <input type="submit" class="btnRegister2" value="Register" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Results-->
    <hr>
    <div class="container results">
        <h3 class="register-heading">Results</h3>
        <form>
            <div class="form-group">
                <label for="first-name">First Name:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="prelim">Prelim:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="midterm">Midterm:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="finals">Finals:</label>
                <br>
            </div>
            <div class="form-group">
                <label for="total-average">Total Average:</label>
                <br>
            </div>
        </form>
    </div>
    </div>
    <script src="/assets/js/script.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>