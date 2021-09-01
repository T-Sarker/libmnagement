<?php include "./inc/header.php" ?>

<?php
  include "./classes/userDetails.php";
  $bk = new UserLogin();

  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['student'])) {
    
      $addUserResult = $bk->insertDataIntoDB($_POST,$_FILES,'student');
    
    
  }
if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['teacher'])) {
    
      $addUserResult = $bk->insertDataIntoDB($_POST,$_FILES,'teacher');
    
    
  }
?>


<style>
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #ffffff;
        background-color: #3b478b;
        border-color: #dee2e6 #dee2e6 #fff;
    }
</style>
<div id="maindash" class="heremainpart">
    <section class="container nedpart">

        <!-- <div class="btn-group choosepart" role="group" aria-label="Basic outlined example">
        <a href="studentregistration.html"><button type="button" class="btn button-link">Student</button></a>
        <a href="teacherregistration.html"><button type="button" class="btn button-link active-button-link">Teacher</button></a>
        <a href="staffregistration.html"><button type="button" class="btn button-link">Staff</button></a>
      </div> -->
        <!-- login form  -->
        <section class="choosehere">

            <div class="btn-group choosepart">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Student</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Teacher</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-primary" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                            aria-selected="false">Staff</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php
                    if (isset($addUserResult)) {
                    echo $addUserResult;
                    }
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="login-form">
                            <!-- name -->
                            <div class="row formpart">
                                <label for="name" class="col-md-2 col-sm-12 col-form-label">Name:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="username" class="col-md-2 col-sm-12 col-form-label">Username:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="username" name="username"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="department" class="col-md-2 col-sm-12 col-form-label">Department:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="department" name="department"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="batchno" class="col-md-2 col-sm-12 col-form-label">Batch No:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="batchno" name="batchno"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="semester" class="col-md-2 col-sm-12 col-form-label">Semester:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="semester" name="semester"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="examno" class="col-md-2 col-sm-12 col-form-label">Exam Roll:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="examno" name="examno"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="registrationid" class="col-md-2 col-sm-12 col-form-label">Registration
                                    ID:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="registrationid"
                                        name="registrationid" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="idcard" class="col-md-2 col-sm-12 col-form-label">ID Card:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass" id="idcard"
                                        name="idcard" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="validationdate" class="col-md-2 col-sm-12 col-form-label">Validation
                                    Date:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="date" class="form-control formclass" id="validationdate"
                                        name="validationdate" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="address" class="col-md-2 col-sm-12 col-form-label">Address:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="address" name="address"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="phonenumner" class="col-md-2 col-sm-12 col-form-label">Phone
                                    Number:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="number" class="form-control formclass" id="phonenumner" name="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="profilepicture" class="col-md-2 col-sm-12 col-form-label">Profile
                                    Picture:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass"
                                        id="profilepicture" name="image" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="email" class="form-control formclass" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control formclass" id="password" name="password"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <button class="btn btnsave" type="submit" name="student">Register</button>
                            </div>
                            <div class="bottompart" onclick="location.href='login.html';">ALREADY HAVE AN ACCOUNT ?
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="login-form">
                            <!-- name -->
                            <div class="row formpart">
                                <label for="name" class="col-md-2 col-sm-12 col-form-label">Name:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="username" class="col-md-2 col-sm-12 col-form-label">Username:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="username" name="username"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="department" class="col-md-2 col-sm-12 col-form-label">Department:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="department" name="department"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="designation" class="col-md-2 col-sm-12 col-form-label">Designation:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="designation"
                                        name="designation" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="idcard" class="col-md-2 col-sm-12 col-form-label">ID Card:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass" id="idcard"
                                        name="idcard" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="validationdate" class="col-md-2 col-sm-12 col-form-label">Validation
                                    Date:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="date" class="form-control formclass" id="validationdate"
                                        name="validationdate" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="address" class="col-md-2 col-sm-12 col-form-label">Address:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control formclass" id="address" name="address"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="phonenumner" class="col-md-2 col-sm-12 col-form-label">Phone
                                    Number:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="tel" class="form-control formclass" id="phonenumner" name="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="profilepicture" class="col-md-2 col-sm-12 col-form-label">Profile
                                    Picture:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="file" accept="image/*" class="form-control formclass"
                                        id="profilepicture" name="image" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="email" class="col-md-2 col-sm-12 col-form-label">Email:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="email" class="form-control formclass" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <label for="password" class="col-md-2 col-sm-12 col-form-label">Password:</label>
                                <div class="col-md-8 col-sm-12">
                                    <input type="password" class="form-control formclass" id="password" name="password"
                                        required>
                                </div>
                            </div>
                            <div class="row formpart">
                                <button class="btn btnsave" type="submit" name="teacher">Register</button>
                            </div>
                            <div class="bottompart" onclick="location.href='login.html';">ALREADY HAVE AN ACCOUNT ?
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..mmmm
                </div>
            </div>



        </section>
    </section>

</div>
<?php include "./inc/footer.php" ?>