<?php

class BookClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insertBookIntoDB($post,$files){

            //handeling the filtration of the inputes
            
            $title = $this->fm->validator($post['title']);
			$title= mysqli_real_escape_string($this->db->link,$title);

            $category = $this->fm->validator($post['category']);
			$category= mysqli_real_escape_string($this->db->link,$category);

            $author = $this->fm->validator($post['author']);
			$author= mysqli_real_escape_string($this->db->link,$author);

            $bookid = $this->fm->validator($post['bookid']);
			$bookid= mysqli_real_escape_string($this->db->link,$bookid);

            $numberofcopy = $this->fm->validator($post['numberofcopy']);
			$numberofcopy= mysqli_real_escape_string($this->db->link,$numberofcopy);

            $Edition = $this->fm->validator($post['Edition']);
			$Edition= mysqli_real_escape_string($this->db->link,$Edition);

            $description = $this->fm->validator($post['description']);
			$description= mysqli_real_escape_string($this->db->link,$description);

            $publisher = $this->fm->validator($post['publisher']);
			$publisher= mysqli_real_escape_string($this->db->link,$publisher);

            $isbn = $this->fm->validator($post['isbn']);
			$isbn= mysqli_real_escape_string($this->db->link,$isbn);

            $releaseDate = $this->fm->validator($post['releaseDate']);
			$releaseDate= mysqli_real_escape_string($this->db->link,$releaseDate);

            $user = $this->fm->validator($post['user']);
			$user= mysqli_real_escape_string($this->db->link,$user);

            $userFrom = $user=='Teacher'? $user:'Admin';

            if (empty($title) || empty($category) || empty($author) || empty($bookid) || empty($numberofcopy) || empty($Edition) || empty($description) || empty($publisher) || empty($isbn) || empty($releaseDate)) {

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Fields Must Not Be Empty!!</span>";

				return $fieldError;
            }


            //handeling the attached file with randomly added number to rename the file and moving it to a directory
			$uploadDirectory = $user=='Teacher'? "uploads/":"../uploads/";
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG', 'pdf','PDF', 'mp4']; // Get all the file extensions
            $fileName = $files['coverImgae']['name'];
            $fileSize = $files['coverImgae']['size'];
            $fileTmpName = $files['coverImgae']['tmp_name'];
            $fileType = $files['coverImgae']['type'];
            $uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);

			if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {

                    $fieldError = "<span style='color:red;text-align: center;display: block;'>This file size or type is not allowed!!</span>";
					return $fieldError;

                } else {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                    
                    $query = "INSERT INTO tbl_book(title,type,author,bookid,quantity,edition,description,publisher,isbn,releaseDate,image,status,addedBy) VALUES('$title','$category','$author','$bookid','$numberofcopy','$Edition','$description','$publisher','$isbn','$releaseDate','$uploadPath',0,'$userFrom')";

                    $result = $this->db->insert($query);
                    if ($result && $didUpload && $result != false) {
                        $successNote = "<span style='color:green;text-align: center;display: block;'>Book inserted successfully </span>";

						return $successNote;
					}
					else{

						$fieldError = "<span style='color:red;text-align: center;display: block;'>Book couldn't be inserted!!</span>";

						return $fieldError;

					}
                }
        }

        public function getBooks(){

            $query = "SELECT * FROM tbl_book WHERE status=0 ORDER BY id";

            $result = $this->db->select($query);

            if ($result) {
                return $result;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Books couldn't be Found!!</span>";

                return $fieldError;

            }
        }

        public function getBooksTeacher(){

            $query = "SELECT * FROM tbl_book WHERE status=0 AND addedBy='Teacher' ORDER BY id";

            $result = $this->db->select($query);

            if ($result) {
                return $result;
            }
            else{

                return false;

            }
        }

        public function editBookIntoDB($id){

            $query = "SELECT * FROM tbl_book WHERE id=$id AND status=0";

            $result = $this->db->select($query);

            if ($result) {
                return $result;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Books couldn't be Found!!</span>";

                return $fieldError;

            }
        }



        public function updateBookIntoDB($post,$files,$id){

            //handeling the filtration of the inputes
            
            $id = $this->fm->validator($id);
			$id= mysqli_real_escape_string($this->db->link,$id);

            $title = $this->fm->validator($post['title']);
			$title= mysqli_real_escape_string($this->db->link,$title);

            $category = $this->fm->validator($post['category']);
			$category= mysqli_real_escape_string($this->db->link,$category);

            $author = $this->fm->validator($post['author']);
			$author= mysqli_real_escape_string($this->db->link,$author);

            $bookid = $this->fm->validator($post['bookid']);
			$bookid= mysqli_real_escape_string($this->db->link,$bookid);

            $numberofcopy = $this->fm->validator($post['numberofcopy']);
			$numberofcopy= mysqli_real_escape_string($this->db->link,$numberofcopy);

            $Edition = $this->fm->validator($post['Edition']);
			$Edition= mysqli_real_escape_string($this->db->link,$Edition);

            $description = $this->fm->validator($post['description']);
			$description= mysqli_real_escape_string($this->db->link,$description);

            $publisher = $this->fm->validator($post['publisher']);
			$publisher= mysqli_real_escape_string($this->db->link,$publisher);

            $isbn = $this->fm->validator($post['isbn']);
			$isbn= mysqli_real_escape_string($this->db->link,$isbn);

            $releaseDate = $this->fm->validator($post['releaseDate']);
			$releaseDate= mysqli_real_escape_string($this->db->link,$releaseDate);

            $user = $this->fm->validator($post['user']);
			$user= mysqli_real_escape_string($this->db->link,$user);

            if (empty($title) || empty($category) || empty($author) || empty($bookid) || empty($numberofcopy) || empty($Edition) || empty($description) || empty($publisher) || empty($isbn) || empty($releaseDate)) {

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Fields Must Not Be Empty!!</span>";

				return $fieldError;
            }


            //handeling the attached file with randomly added number to rename the file and moving it to a directory
			$uploadDirectory = $user=='Teacher'? "uploads/":"../uploads/";
            $fileExtensions = ['jpeg', 'jpg', 'png','JPG', 'JPEG', 'PNG', 'pdf','PDF', 'mp4']; // Get all the file extensions
            $fileName = $files['coverImgae']['name'];
            $fileSize = $files['coverImgae']['size'];
            $fileTmpName = $files['coverImgae']['tmp_name'];
            $fileType = $files['coverImgae']['type'];
            $uploadPath = $uploadDirectory . rand(0,990).basename($fileName);
            $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);


            if ($fileName=='') {
                $query = "UPDATE tbl_book SET	title ='$title',
			            							type='$category',
			            							author ='$author',
			            							bookid ='$bookid',
			            							quantity ='$numberofcopy',
			            							edition ='$Edition',
			            							description ='$description',
			            							publisher ='$publisher',
			            							isbn='$isbn',
			            							releaseDate ='$releaseDate',
			            							status =0 WHERE id='$id'";
                $result = $this->db->update($query);
                if ($result) {
                    echo "<script>window.location.href = 'booklist.php';</script>";
                }
                else{

                    $fieldError = "<span style='color:red;text-align: center;display: block;'>Book couldn't be inserted!!</span>";

                    return $fieldError;

                }
            } else if($fileName!=''){

                if (!in_array($fileType, $fileExtensions) && $fileSize > 200000) {

                    $fieldError = "<span style='color:red;text-align: center;display: block;'>This file size or type is not allowed!!</span>";
					return $fieldError;

                } else {
                    
                    $query = "SELECT * FROM tbl_book WHERE id='$id'";
                    $result = $this->db->select($query);
                    $imgs = mysqli_fetch_assoc($result);
        
                    $img = $imgs['image'];
                    $unLink = unlink(__DIR__ .'/'. $img);


                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                    
                    $query = "UPDATE tbl_book SET	title ='$title',
			            							type='$category',
			            							author ='$author',
			            							bookid ='$bookid',
			            							quantity ='$numberofcopy',
			            							edition ='$Edition',
			            							description ='$description',
			            							publisher ='$publisher',
			            							isbn='$isbn',
			            							releaseDate ='$releaseDate',
                                                    image='$uploadPath',
			            							status =0 WHERE id='$id'";

                    $result = $this->db->update($query);
                    if ($result && $didUpload && $result != false) {
                        echo "<script>window.location.href = 'booklist.php';</script>";
                    }
                    else{

                        $fieldError = "<span style='color:red;text-align: center;display: block;'>Book couldn't be inserted!!</span>";

                        return $fieldError;

                    }
                }
            }else{
                $fieldError = "<span style='color:red;text-align: center;display: block;'>Somethng is Wrong!!</span>";

                    return $fieldError;
            }
            

			
        }


        public function deleteBookIntoDB($id){

            $query = "DELETE FROM tbl_book WHERE id=$id";

            $result = $this->db->select($query);

            if ($result) {
                echo "<script>window.location.href = 'booklist.php';</script>";
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Books couldn't be Found!!</span>";

                return $fieldError;

            }
        }

        public function deleteTeachersBookIntoDB($id){

            $query = "DELETE FROM tbl_book WHERE id=$id AND addedBy='Teacher'";

            $result = $this->db->delete($query);

            if ($result) {
                return "<script>window.location.href = 'booklist.php';</script>";
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Books couldn't be Found!!</span>";

                return $fieldError;

            }
        }
    }
?>