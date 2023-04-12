<?php
    include"config.php";
    
    $email = @$_POST['email'];
    $password = @MD5($_POST['password']);

    $ceking = mysqli_query($konek,"SELECT * FROM users WHERE email = '".$email."' AND `password` = '".$password."'");
    $ketemu = mysqli_num_rows($ceking);
    if($ketemu > 0){
        echo"sukses";
    }else{
        echo"gagal";
    }
?>