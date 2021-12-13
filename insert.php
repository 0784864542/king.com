<?php
$username_POST['username'];
$password_POST['password'];
$gender_POST['gender'];
$email_POST['email'];
$phoneCode_POST['phoneCode'];
$phone_POST['phone'];

if(!empty($username)|| !empty($password) || !empty($gender)|| !empty($email) ||!empty($phoneCode) || !empty($phone)); {
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="register";

    // create connection
    $conn= new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')' .mysqli_connect_error());
    }else {
        $SELECT="SELECT email From register Where email=? Limit 1";
        $INSERT="INSERT Into register ( username,password,gender,email,phoneCode,phone)values(?,?,?,?,?,?)";

        //prepare statement
        $stmt =$conn_>prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt_>execute();
        $stmt_>bind_result($email);
        $stmt_>store_result();
        $rnum=$stmt_>num_rows;

        if($rnum==0){
            $stmt_>close();

            $stmt=$conn->prepare($INSERT);
            $stmt_>bind_param("ssssii",$username,$password,$gender,$email,$phoneCode,$phone);
            $stmt_>execute();
            echo" New record inserted successfully";
        }else{
            echo"Someone already registered using this email";
        }
        $stmt_>close();
        $conn_>close();
    }
}else{
    echo"All field are required";
    die();
}
?>
