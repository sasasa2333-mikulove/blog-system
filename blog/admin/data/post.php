<?php

// Get All Posts
function getAll($conn) {
    $sql = "SELECT * FROM post WHERE publish = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get All Deep admin
function getAllDeep($conn) {
    $sql = "SELECT * FROM post";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get All Posts By Category
function getAllPostsByCategory($conn, $category_id) {
    $sql = "SELECT * FROM post WHERE category=? AND publish = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$category_id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get By ID
function getById($conn, $id) {
    $sql = "SELECT * FROM post WHERE post_id = ? AND publish = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Get By ID Deep admin
function getByIdDeep($conn, $id) {
    $sql = "SELECT * FROM post WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Search
function search($conn, $key) {
    $key = "%{$key}%";
    $sql = "SELECT * FROM post WHERE publish = 1 AND(post_title LIKE ? OR post_text LIKE ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get Category By ID
function getCategoryById($conn, $id) {
    $sql = "SELECT * FROM category WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Get 5 Categories
function get5Categories($conn) {
    $sql = "SELECT * FROM category LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get All Categories
function getAllCategories($conn) {
    $sql = "SELECT * FROM category ORDER BY category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// Get User By ID
function getUserById($conn, $id) {
    $sql = "SELECT id, fname, username FROM users WHERE id =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// Delete By ID
function deleteById($conn, $id) {
    $sql = "DELETE FROM post WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}