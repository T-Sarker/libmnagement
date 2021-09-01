<?php include "./inc/header.php" ?>
<?php
  include "./classes/bookClass.php";
  $bk = new BookClasses();
  $getBooks = $bk->editBookIntoDB($_GET['id']);
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
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>My List</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <!-- <li><a class="nav-link" href="allitem.html">All Item</a></li> -->
          <li><a class="nav-link" href="booklist.php">All Books</a></li>
          <li><a class="nav-link" href="wishlist.html">Wishlist</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-book"></i><span>Manage Book</span><i
            class="fas fa-chevron-down ms-3 fa-xs"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-link" href="addbook.php">Add Book</a></li>
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
        <a class="nav-link" href="returnstatus.html" aria-current="page"><i class="fas fa-book-open"></i><span>Return
            Status</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="requestbook.html" aria-current="page"><i class="bi bi-journals"></i><span>Request
            Book</span></a>
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
  <div class="table-responsive scroll">
  <?php
          if (isset($getBooks)) {
            while ($book = $getBooks->fetch_assoc()) {
        ?>
        <div class="row">
          <div class="mediaheader col-md-4 col-sm-12">
            <img class="mediaimg" src="<?php echo str_replace("../",'',$book['image']); ?>" alt="">
          </div>
          <div class="Ebook-1_content col-md-7 col-sm-12 leftpadd">
            <div class="herebooktitle"><?php echo $book['title'] ?></div>
            <div class="herebooksubtitle">
              by <span class="byauthor"><?php echo $book['author'] ?></span></div>
            <div class="hereparts">
              <p class="oritype"><span><i class="fas fa-book-open"></i></span> <?php echo $book['type'] ?></p>
              <a href="#" class="btn previewbtn" tabindex="-1" role="button" aria-disabled="true">Preview</a>
            </div>

            <!-- E-bbok describ  -->
            <div class="E-book_1-describ">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Detail</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent" style="margin-top:20px">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <hr class="describe-hr">
                <?php echo $book['description'] ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <span class="">Edition :</span> <span class="publishaer ms-2"><?php echo $book['edition'] ?></span><br>
                    <span class="">Publisher :</span> <span class="publishaer ms-2"><?php echo $book['publisher'] ?></span>
                    <hr class="detail-hr">
                    <p><span>ISBN :</span> <span><?php echo $book['isbn'] ?></span></p>
                    <p><span>Release Date :</span> <span class=""><?php echo $book['releaseDate'] ?></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
                }
            }
        ?>
          </div>
  </div>
</main>

      <?php include "./inc/footer.php" ?>