<?php
    include "config/config.php"; 
	include "lib/Session.php";
	Session::checkLogin();

    include "lib/Database.php"; 
    include "helpers/Format.php"; 
    $db = new Database(); 
	$fm = new Format(); 
    $response=array(
        'success'=>false
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $fm->validation($_POST['username']);
        $password = $fm->validation(md5($_POST['password']));
        $username = mysqli_real_escape_string($db->link , $username);
        $password = mysqli_real_escape_string($db->link ,$password);
        $query = "select * from tbl_user where username = '$username' AND password = '$password'";
        $result = $db->select($query); 
        if($result!=false){
            $value = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);
            if($row>0){
                Session::set("login", true);
                Session::set("username", $value['username']);

                $response=array(
                    'success'=>true
                );
                //Session::set("userId", $value['id']);
                //Session::set("userRole", $value['role']);
               // header("Location:index.php");
            }
            else{
                $response=array(
                    'success'=>false
                );
            }
        }
        else{
            $response=array(
                'success'=>false
            );
        }
        echo json_encode($response);
    }
   

?>