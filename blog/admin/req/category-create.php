<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['category'])) {
        include "../../db_conn.php";
        $category = $_POST['category'];

        if (empty($category)) {
            $em = "必须填写目录";
            header("Location: ../category-add.php?error=$em");
            exit;
        }

        $sql = "INSERT INTO category(category) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$category]);

        if ($res) {
            $sm = "成功创建！";
            header("Location: ../category-add.php?success=$sm");
            exit;
        } else {
            $em = "未知错误发生";
            header("Location: ../category-add.php?error=$em");
            exit;
        }
    } else {
        header('Location: ../category-add.php');
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}