<?php
    include'config.php';
    if(isset($_POST['submit'])&& $_POST["username"]!=''&&$_POST["password"]!=''&& $_POST["repassword"!='']){  
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $level = 0;
        if($password != $repassword){
            header("location:res.php");
        }
        $sql = "SELECT * FROM users WHERE username ='$username ";
        $old = mysqli_query($conn,$sql);
        $password = md5($password);
        if (mysqli_num_rows($old)>0){
            header("location:res.php"); 
        }
        $sql = "INSERT INTO users (username,password,level) VALUE ('$username','$password','$level')";
        mysqli_query($conn,$sql);
        echo"Đã đăng ký thành công";
    }else{
        header("location:res.php"); 
    }
?>