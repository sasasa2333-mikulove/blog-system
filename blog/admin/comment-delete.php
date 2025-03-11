<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['comment_id']) {
    $comment_id = $_GET['comment_id'];
    include_once("data/comment.php");
    include_once("../db_conn.php");
    $res = deleteCommentById($conn, $comment_id);
    if ($res) {
        $sm = "成功删除！";
        header("Location: comment.php?success=$sm");
        exit;
    } else {
        $em = "未知错误发生";
        header("Location: comment.php?error=$em");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}