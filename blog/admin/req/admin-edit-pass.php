<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['cpass']) && isset($_POST['new_pass']) && isset($_POST['cnew_pass'])) {
        include "../../db_conn.php";
        $cpass = $_POST['cpass'];
        $new_pass = $_POST['new_pass'];
        $cnew_pass = $_POST['cnew_pass'];
        $id = $_SESSION['admin_id'];

        if (empty($cpass)) {
            $em = "必须填写旧密码";
            header("Location: ../profile.php?error=$em");
            exit;
        } else if (empty($new_pass)) {
            $em = "必须填写新密码";
            header("Location: ../profile.php?error=$em");
        } else if (empty($cnew_pass)) {
            $em = "必须填写确认密码";
            header("Location: ../profile.php?error=$em");
        } else if ($cnew_pass != $new_pass) {
            $em = "两次填写密码不一致！";
            header("Location: ../profile.php?error=$em");
        }

        $sql = "SELECT password FROM admin WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        if (!password_verify($cpass, $data['password'])) {
            $em = "旧密码错误！";
            header("Location: ../profile.php?error=$em");
        } else {
            $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $sql = "UPDATE admin SET password=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$new_pass]);

            if ($res) {
                $sm = "成功修改密码！";
                header("Location: ../profile.php?success=$sm");
                exit;
            } else {
                $em = "未知错误发生";
                header("Location: ../profile.php?error=$em");
                exit;
            }
        }
    } else {
        header("Location: ../profile.php");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}