<?php

class MessageClasses{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

        public function getAllmessage($id){

            
            $query = "SELECT * FROM tbl_message WHERE toId='$id'";

            $result = $this->db->select($query);

            if (!$result && mysqli_num_rows($result)<0) {
                return false;
            }elseif($result){
                return $result;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Requests couldn't be Found!!</span>";

                return $fieldError;

            }
        }

        public function getAllSubmessage($pid,$mid){

            
            $query = "SELECT * FROM tbl_message WHERE fromId='$pid' AND parrentId='$mid'";

            $result = $this->db->select($query);

            if (mysqli_num_rows($result)<=0) {
                return false;
            }elseif(mysqli_num_rows($result)>0){
                return $result;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Requests couldn't be Found!!</span>";

                return $fieldError;

            }
        }



        public function getAllRequestedUserDetails($id,$type){

            if ($type=='Student') {
                $query = "SELECT * FROM tbl_student WHERE id='$id'";
            } elseif ($type=='Teacher') {
                $query = "SELECT * FROM tbl_teacher WHERE id='$id'";
            }

            $result = $this->db->select($query);

            if (mysqli_num_rows($result)==0) {
                return false;
            }elseif($result){
                return $result;
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Requests couldn't be Found!!</span>";

                return $fieldError;

            }
        }

        public function returnBook($borrowId,$uid,$type){
            $query = "UPDATE tbl_borrow SET status=2 WHERE id='$borrowId' AND userId='$uid' AND userType='$type'";
            $result = $this->db->update($query);

            if($result){

                echo "<script>window.location.href = 'returnstatus.php';</script>";
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Requests couldn't be Found!!</span>";

                return $fieldError;

            }

        }


        public function insertMessage($to,$from,$msg,$parentId){

            $date = date("Y/m/d");
            
            $query = "INSERT INTO tbl_message(fromId,toId,message,parrentId,timeStamp,seen) VALUES('$from','$to','$msg','$parentId','$date',0)";
            $result = $this->db->insert($query);

            if($result){

                echo "<script>alert('alright')</script>";
            }
            else{

                $fieldError = "<span style='color:red;text-align: center;display: block;'>Sorry Error Occured!!</span>";

                return $fieldError;

            }
        }
}
?>