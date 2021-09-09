<?php
  include "./classes/profileClass.php";
  $bk = new UserProfile();
  $id = Session::get('Uid');
  $type = Session::get('Utype');
  $userResult = $bk->userProfile($id,$type);
?>

<?php
    if (isset($userResult)) {
        
        while ($user = $userResult->fetch_assoc()) {
?>
<div class="sidebar">
<div class="sidebar-brand">
    <div class="profilehere" onclick="location.href='profile.php';">
      <img src="<?php echo Session::get('Uimage') ?>" alt="<?php echo Session::get('Uuser') ?>">
      
    </div>
    <div class="namepart">
      <div class="sidename"><?php echo Session::get('Uuser') ?></div>
      <div class="sideusername"><?php echo "@".Session::get('Uname') ?></div>
    </div>
  </div>

    <div class="sidebarmenu">
        <ul class="nav" id="nav_accordion">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-list"></i><span>My List</span><i
                        class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                <ul class="submenu collapse">
                    <li><a class="nav-link" href="allitem.html">All Item</a></li>
                    <li><a class="nav-link" href="wishlist.html">Wishlist</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-book-half"></i><span>Issue Status</span><i
                        class="fas fa-chevron-down ms-3 fa-xs"></i></a>
                <ul class="submenu collapse">
                    <li><a class="nav-link" href="issued.html">Issued</a></li>
                    <li><a class="nav-link" href="borrowed.html">Borrowed</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="returnstatus.php" aria-current="page"><i
                        class="fas fa-book-open"></i><span>Return Status</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="requestbook.html" aria-current="page"><i
                        class="bi bi-journals"></i><span>Request Book</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="message.html" aria-current="page"><i
                        class="fas fa-envelope"></i><span>Message</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="editprofile.html" aria-current="page"><i class="fas fa-bars"></i><span>Edit
                        Profile</span></a>
            </li>
        </ul>

    </div>
</div>
<div class="dashboadheader">
    <div class="dashnav">
        <div class="dashplace">
            <label for="nav-toggle">
                <span class="fas fa-bars"></span>
            </label>
            Profile
        </div>
    </div>
    <a class="nav-link" href="home.html"><i class="fas fa-home"></i> Home</a>
</div>

<main>
    <div class="container-fluid allitem" id="maindash">

        <div class="accountinfo">
            <div class="accountimg">
                <img src="<?php echo $user['cardImage'] ?>" alt="Profile">
            </div>

            <div class="activestatus">
                <div class="info">Account Info</div>
                <div class="status">Account Status - <span class="activeprofile">Active</span></div>
            </div>
        </div>
        <table class="table table-hover">

            <tbody>
                <tr style="padding:20px;">
                    <td>Name:</td>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Username:</td>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Email:</td>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Department:</td>
                    <td><?php echo $user['department'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Batch:</td>
                    <td><?php echo $user['batch'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>semester:</td>
                    <td><?php echo $user['semester'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Batch:</td>
                    <td><?php echo $user['roll'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>semester:</td>
                    <td><?php echo $user['registerNo'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Phone:</td>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Address:</td>
                    <td><?php echo $user['address'] ?></td>
                </tr>
                <tr style="padding:20px;">
                    <td>Status:</td>
                    <td><?php echo $user['status']==0? '<span class="activeprofile">Active</span>':'<span class="badge badge-danger">Blocked</span>' ?>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
</main>

<?php
        }
    }else {
        echo $userResult; 
    }
?>