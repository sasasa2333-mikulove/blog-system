<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username'])) {
        include "../../db_conn.php";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $id = $_SESSION['admin_id'];

        if (empty($fname)) {
            $em = "必须填写名";
            header("Location: ../profile.php?error=$em");
            exit;
        } else if (empty($lname)) {
            $em = "必须填写姓";
            header("Location: ../profile.php?error=$em");
        } else if (empty($username)) {
            $em = "必须填写用户名";
            header("Location: ../profile.php?error=$em");
        }

        $sql = "UPDATE admin SET first_name=?, last_name=?, username=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$fname, $lname, $username, $id]);

        if ($res) {
            $_SESSION['username'] = $username;
            $sm = "成功修改！";
            header("Location: ../profile.php?success=$sm");
            exit;
        } else {
            $em = "未知错误发生";
            header("Location: ../profile.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../profile.php");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}