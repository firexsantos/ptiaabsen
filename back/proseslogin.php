<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');

    include"config.php";
    
    $post_json = array();

    $email = @$_POST['email'];
    $password = @MD5($_POST['password']);

    $ceking = mysqli_query($konek,"SELECT * FROM users WHERE email = '".$email."' AND `password` = '".$password."'");
    $ketemu = mysqli_num_rows($ceking);
    if($ketemu > 0){
        $data = mysqli_fetch_array($ceking);
        array_push($post_json, array(
            "status" => "sukses",
            "id_user" => $data['id_user'],
            "nm_user" => $data['nm_user'],
            "email" => $data['email'],
            "pesan" => "<div class='alert alert-success'>Selamat datang kembali <b>".$data['nm_user']."</b></div>"
        ));
    }else{
        array_push($post_json, array(
            "status" => "gagal",
            "pesan" => "<div class='alert alert-danger'>Username dan Password tidak cocok</div>"
        ));
    }

    echo json_encode($post_json);
?>