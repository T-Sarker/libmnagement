<?php

class BorrowClass{

    private $db;
    private $fm;
    
    function __construct()
    {
        # connecting db and formats with a constructor
        $this->db = new Database();
        $this->fm = new Format();
    }
	
	public function borrowBook($bookId,$userId,$bookName,$type){

        $bookId = $this->fm->validator($bookId);
		echo $bookId= mysqli_real_escape_string($this->db->link,$bookId);

        $userId = $this->fm->validator($userId);
		echo $userId= mysqli_real_escape_string($this->db->link,$userId);

        $bookName = $this->fm->validator($bookName);
		echo $bookName= mysqli_real_escape_string($this->db->link,$bookName);

        $date = date("Y/m/d");

        $query = "SELECT * FROM tbl_borrow WHERE bookId='$bookId' AND userId='$userId' AND status=0";
        $check = $this->db->select($query);

        if ($check && $check!=null) {
            return false;
        }else{
            $query = "INSERT INTO tbl_borrow(bookId,userId,userType,bookName,borrowDate,forDays,status) VALUES('$bookId','$userId','$type','$bookName','$date',0,0)";

            $result = $this->db->insert($query);
            if ($result && $result != false) {
                return true;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Request Failed!!</span>";

                return $fieldError;

            }
        }

        
    }


}
?>