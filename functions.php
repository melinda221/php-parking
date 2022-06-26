<?php  
require_once('config/connection.php');
date_default_timezone_set("Asia/Jakarta"); 
session_start();  
    class functions {  

        private $db;
            
        function __construct() {  
              
            // connecting to database  
            $this->db = new connection();
               
        }
        
        public function addEditDataUser($data)
        {
            $ids = $_GET['id'];
            $username = $data['username'];
            $password = $data['password'];
            $email = $data['email'];
            $conf = $data['conf'];
            $created_at = $data['created_at'];

            if (isset($_GET['id'])) {
                $query = "UPDATE users SET
                    username = '$username',
                    password = '$password',
                    email = '$email',
                    conf = '$conf',
                    created_at = '$created_at'
                    WHERE id ='$ids' 
                ";
              }else {
                $query = "INSERT INTO users(username,password,email,conf,created_at) VALUES
                ('$username','$password' ,'$email', '$conf', '$created_at')";
            }
            

            $data_user = mysqli_query($this->db->conn, $query) or die(mysqli_error($this->db->conn));

            return $data_user;
        }
        public function Login($username, $password){  
            $res = mysqli_query($this->db->conn ,"SELECT * FROM users WHERE username = '".$username."' AND password = '".($password)."'");  
            $user_data = mysqli_fetch_array($res);  
            

            $no_rows = mysqli_num_rows($res);  
              
            if ($no_rows == 1) {  
           
                $_SESSION['login'] = true;  
                $_SESSION['id'] = $user_data['id'];  
                $_SESSION['username'] = $user_data['username'];   
                return TRUE;  
            }  
            else {  
                return FALSE;  
            }  
        }  
        public function isUserExist($username){  
            $query = mysqli_query("SELECT * FROM users WHERE username = '".$username."'");  
            echo $row = mysqli_num_rows($query);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }
        
        public function getDataParkir()
        {
          
            $rows['data'] = mysqli_query($this->db->conn ,"SELECT * FROM transportations_banyumanik WHERE user_id= '$_SESSION[id]' ORDER BY id DESC LIMIT 1" );
            $count_parkir = mysqli_query($this->db->conn ,"SELECT COUNT(*) FROM transportations_banyumanik WHERE updated_at IS NULL");
            $rows['count_parkir'] = mysqli_fetch_assoc($count_parkir);
        
            return $rows;

        }

       

        public function addEditDataParkir($data)
        {
            $id = $_GET['id'];
            $user_id = $data['user_id'];
            $zone = 'Banyumanik';
            $code = 'BANYUMANIK-' . bin2hex(random_bytes(8));
            $type = $data['type'];
            $created_at = $data['created_at'];

            if (isset($_GET['id'])) {
                $query = "UPDATE transportations_banyumanik SET
                    user_id = '$user_id',
                    zone = '$zone',
                    type = '$type',
                    created_at = '$created_at'
                    WHERE id ='$id' 
                ";
            } else {
                $query = "INSERT INTO transportations_banyumanik(user_id,code,zone,type,created_at) VALUES
                ('$user_id','$code' ,'$zone','$type', '$created_at')";
            }

            $data_parkir = mysqli_query($this->db->conn, $query) or die(mysqli_error($this->db->conn));

            return $data_parkir;
        }


        public function detailParkir($id)
        {
            $rows = mysqli_query($this->db->conn ,"SELECT * FROM transportations_banyumanik WHERE id=$id");
            
            return $rows;
        }


       
        public function updateTime($data)
        {
            $code = $data['code'];
       

            $data = mysqli_query($this->db->conn ,"UPDATE transportations_banyumanik SET updated_at=now() WHERE code='$code'") or die(mysqli_error($this->db->conn));

            return $data;
        }

        public function transaction($code)
        {
            $rows = mysqli_query($this->db->conn ,"SELECT * FROM transportations_banyumanik WHERE code='$code'");
            
            return $rows;
        }
    }  
?>  