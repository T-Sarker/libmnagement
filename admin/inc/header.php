<?php   
    include "../lib/session.php";
    Session::checkSession();

    date_default_timezone_set('Asia/Dhaka');
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>
<?php include '../classes/logoClass.php'; ?>

<?php
    $bc= new LogoClasses();
    $af= new Format();
?>

<?php
    if (Session::get('Alogin') != true) {
        echo "<script>window.location.href = 'login.php';</script>";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action']=='logout') {
          Session::set('Alogin','false');
          unset($_SESSION['adminEmail']);
          echo "<script>window.location.href = 'login.php';</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

    <!-- Poppins Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- ======= Icons used for dropdown (you can use your own) ======== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    

    
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="./assets/img/profile.png" alt="Profile"></br>
            <h3>Admin</h3>
        </div>
        
        <div class="sidebarmenu">
            <ul class="nav" id="nav_accordion">
                <li class="nav-item">
                  <a class="nav-link active" href="dashboard.php" aria-current="page"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fab fa-sourcetree"></i><span>Resource List</span><i class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                  <ul class="submenu collapse">
                      <li><a class="nav-link" href="booklist.php"></i> Book List</a></li>
                      <li><a class="nav-link" href="ebooklist.php">Ebook List</a></li>
                      <li><a class="nav-link" href="journallist.php">Journal List</a> </li>
                      <li><a class="nav-link" href="thisislist.php"></i> Thesis List</a></li>
                      <li><a class="nav-link" href="assignmentlist.php">Assignment List</a></li>
                      <li><a class="nav-link" href="reportlist.php">Report List</a> </li>
                      <li><a class="nav-link" href="videolist.php"></i> Video List</a></li>
                      <li><a class="nav-link" href="gallerylist.html">Gallery List</a></li>
                      <li><a class="nav-link" href="cddvdlist.html">CD/DVD List</a> </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Manage Resource</span><i class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                  <ul class="submenu collapse">
                      <li><a class="nav-link" href="addbook.php">Add Book</a></li>
                      <li><a class="nav-link" href="addebook.php">Add E-book</a></li>
                      <li><a class="nav-link" href="addjournal.php">Add Journal</a></li>
                      <li><a class="nav-link" href="addthisis.php">Add Thesis</a></li>
                      <li><a class="nav-link" href="addassignment.php">Add Assignment</a></li>
                      <li><a class="nav-link" href="addreport.php">Add Report</a></li>
                      <li><a class="nav-link" href="addvideo.php">Add Video</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="bi bi-book-half"></i><span>Issue</span><i class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                  <ul class="submenu collapse">
                    <li><a class="nav-link" href="issuerequest.html">Issue Request</a></li>
                      <li><a class="nav-link" href="borrowed.html">Borrowed</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-book-open"></i><span>Return Book</span><i class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                  <ul class="submenu collapse">
                    <li><a class="nav-link" href="returnrequest.html">Return Request</a></li>
                      <li><a class="nav-link" href="returned.html">Returned</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-users"></i><span>Manage Users</span><i class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                  <ul class="submenu collapse">
                    <li><a class="nav-link" href="teachers.html">Teachers</a></li>
                      <li><a class="nav-link" href="students.html">Students</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="requestedbook.html"><i class="bi bi-journals"></i><span>Requested Book</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upcoming.html"><i class="fas fa-dot-circle"></i><span>Upcoming Events</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="message.html"><i class="fas fa-envelope"></i><span>Messages</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Profile</span></a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="profileedit.html"><i class="fas fa-bars"></i><span>Edit profile</span></a>
                </li> 
              </ul>

        </div>
    </div>    

    <div class="main-content">

<!-- ==================== HEADER START ===================== -->
<header id="mainheader" class="topheader">
    <div class="container">
      <nav class="navbar navbar-expand-lg adminnav">
        <div class="container-fluid">
          <div class="navbar-brand adminlogo">
            <img src="./assets/img/GBlogo.png" alt="/GBlogo">
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse mainmenu" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html">Services</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Resources
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="allbook.html">Book</a></li>
                  <li><a class="dropdown-item" href="allebook.html">Ebook</a></li>
                  <li><a class="dropdown-item" href="alljournal.html">Journal</a></li>
                  <li><a class="dropdown-item" href="allthesis.html">Thesis</a></li>
                  <li><a class="dropdown-item" href="allassignment.html">Assignment</a></li>
                  <li><a class="dropdown-item" href="allreport.html">Report</a></li>
                  <li><a class="dropdown-item" href="allvideos.html">Videos</a></li>
                  <li><a class="dropdown-item" href="allgallery.html">Gallery</a></li>
                  <li><a class="dropdown-item" href="allcddvd.html">CD/DVD</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="staffall.html" tabindex="-1" aria-disabled="true">Staff</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="landing.html" tabindex="-1" aria-disabled="true">Log Out</a>
              </li>
            </ul>
          </div>

            
            <div class="icongroup">
              <div class="iconsall searchbar">
                <input type="text" class="searchbox" placeholder="Search">
                <div class="searchicon">
                  <i class="fas fa-search headersearch"></i>
                </div>
              </div>
          
              <div class="iconsall dropdown">
                  <i class="fas fa-user" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu profilelogout" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="?action=logout">Log Out</a></li>
                </ul>
              </div>
            </div>

        </div>
      </nav>
    </div>
  </header>

<!-- ==================== HEADER END ===================== -->