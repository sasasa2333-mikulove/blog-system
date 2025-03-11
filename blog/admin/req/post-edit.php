<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    if (isset($_POST['title']) && isset($_FILES['cover']) && isset($_POST['text']) && isset($_POST['post_id']) && isset($_POST['cover_url']) && isset($_POST['category'])) {
        include "../../db_conn.php";
        $title = $_POST['title'];
        $text = $_POST['text'];
        $post_id = $_POST['post_id'];
        $category = $_POST['category'];
        $cover_url = $_POST['cover_url'];
        if (empty($title)) {
            $em = "必须填写标题";
            header("Location: ../post-edit.php?post_id=$post_id&error=$em");
            exit;
        }
        $image_name = $_FILES['cover']['name'];
        if ($cover_url != "default.jpg" && $image_name != "") {
            $clocation = "../../upload/blog/" . $cover_url;
            if (!unlink($clocation)) {

            }
        }
        if ($image_name != "") {
            $image_size = $_FILES['cover']['size'];
            $image_temp = $_FILES['cover']['tmp_name'];
            $error = $_FILES['cover']['error'];
            if ($error === 0) {
                if ($image_size > 130000) {
                    $em = "图片过大";
                    header("Location: ../post-edit.php?post_id=$post_id&error=$em");
                    exit;
                } else {
                    $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $image_ex = strtolower($image_ex);
                    $allowed_exs = array('jpg', 'jpeg', 'png');
                    if (in_array($image_ex, $allowed_exs)) {
                        $new_image_name = uniqid("COVER-", true) . '.' . $image_ex;
                        $image_path = '../../upload/blog/' . $new_image_name;
                        move_uploaded_file($image_temp, $image_path);
                        $sql = "UPDATE post SET post_title=?, post_text=?, category=?, cover_url=? WHERE post_id=?";
                        $stmt = $conn->prepare($sql);
                        $res = $stmt->execute([$title, $text, $category, $new_image_name, $post_id]);
                    } else {
                        $em = "不能上传该种类型的图片";
                        header("Location: ../post-edit.php?post_id=$post_id&error=$em");
                        exit;
                    }
                }
            }
        } else {
            $sql = "UPDATE post SET post_title=?, post_text=?, category=? WHERE post_id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text, $category, $post_id]);
        }
        if ($res) {
            $sm = "成功修改！";
            header("Location: ../post-edit.php?post_id=$post_id&success=$sm");
            exit;
        } else {
            $em = "未知错误发生";
            header("Location: ../post-edit.php?post_id=$post_id&error=$em");
            exit;
        }
    } else {
        header("Location: ../post-edit.php");
        exit;
    }
} else {
    header("Location: ../admin-login.php");
    exit;
}