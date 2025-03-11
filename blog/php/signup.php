<?php 
if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['pass'])) {
    include "../db_conn.php";
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "必须输入姓名";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    } else if(empty($uname)) {
    	$em = "必须输入用户名";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    } else if(empty($pass)) {
    	$em = "必须输入密码";
    	header("Location: ../signup.php?error=$em&$data");
	    exit;
    } else {
    	// 哈希加密密码
    	$pass = password_hash($pass, PASSWORD_DEFAULT);
    	$sql = "INSERT INTO users(fname, username, password) VALUES(?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass]);
    	header("Location: ../signup.php?success=成功创建账户");
	    exit;
    }
} else {
	header("Location: ../signup.php?error=错误");
	exit;
}