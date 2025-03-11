<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['category']) && isset($_POST['id'])) {
        include "../../db_conn.php";
        $id = $_POST['id'];
        $category = $_POST['category'];

        if (empty($category)) {
            $em = "必须填写目录";
            header("Location: ../category-edit.php?id=$id&error=$em");
            exit;
        }

        $sql = "UPDATE category SET category=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$category, $id]);

        if ($res) {
            $sm = "成功修改！";
            header("Location: ../category-edit.php?id=$id&success=$sm");
            exit;
        } else {
            $em = "未知错误发生";
            header("Location: ../category-edit.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../category-edit.php");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}