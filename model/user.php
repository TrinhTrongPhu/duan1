<?php 
    function insert_taikhoan($user, $pass, $email) {
        // Chỉnh sửa lỗi cú pháp trong câu lệnh SQL
        $sql = "INSERT INTO users ( username, password, email) VALUES ('$user', '$pass', '$email')";
        pdo_execute($sql);
    }

    function checkuser($user,$pass){
        $sql = "select * from users where username='" . $user . "' and password='" . $pass . "'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function update_user($id,$user,$pass,$email,$address,$phone){
        $sql="UPDATE users set `password`='$pass', `username`='$user', `email`='$email', `address`='$address', `phone`='$phone' where id='$id'";
        pdo_execute($sql);
    }
?>