<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_POST['comment_id'])) {
    include_once("../db_conn.php");
    include_once("../admin/data/comment.php");

    $user_id = $_SESSION['user_id'];
    $comment_id = $_POST['comment_id'];

    if (deleteUserComment($conn, $comment_id, $user_id)) {
        echo json_encode([
            "status" => "success",
            "message" => "评论已成功删除！"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "删除评论失败！请重试或联系管理员。"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "未登录或请求参数不完整！"
    ]);
}