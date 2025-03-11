<?php
// Get All
function getAllComment($conn) {
    $sql = "SELECT * FROM comment";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get Comment By ID
function getCommentById($conn, $id) {
    $sql = "SELECT * FROM comment WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Count By Post ID
function countByPostId($conn, $id) {
    $sql = "SELECT * FROM comment WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

// Like Count By Post ID
function likeCountByPostId($conn, $id) {
    $sql = "SELECT * FROM post_like WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->rowCount();
}

// Is Liked By User ID
function isLikedByUserId($conn, $post_id, $user_id) {
    $sql = "SELECT * FROM post_like WHERE post_id = ? AND liked_by = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$post_id, $user_id]);

    if ($stmt->rowCount() > 0) {
        return 1;
    } else {
        return 0;
    }
}

// Get Comments By Post ID
function getCommentsByPostId($conn, $id) {
    $sql = "SELECT * FROM comment WHERE post_id = ? ORDER BY comment_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Delete By ID
function deleteCommentById($conn, $id) {
    $sql = "DELETE FROM comment WHERE comment_id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Delete By ID
function deleteCommentByPostId($conn, $id) {
    $sql = "DELETE FROM comment WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Delete By ID
function deleteLikeByPostId($conn, $id) {
    $sql = "DELETE FROM post_like WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}

// Delete User Comment By ID
function deleteUserComment($conn, $comment_id, $user_id) {
    $sql = "SELECT * FROM comment WHERE comment_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$comment_id, $user_id]);

    if ($stmt->rowCount() == 1) {
        $sql = "DELETE FROM comment WHERE comment_id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$comment_id])) {
            return 1;
        }
    }
    return 0;
}
