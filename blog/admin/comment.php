<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>评论控制面板</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    include_once("data/comment.php");
    include_once("data/post.php");
    include_once("../db_conn.php");
    $comments = getAllComment($conn);

    ?>
    <div class="main-table">
        <h3 class="mb-3">所有评论</h3>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-warning">
                <?=htmlspecialchars($_GET['error'])?>
            </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success">
                <?=htmlspecialchars($_GET['success'])?>
            </div>
        <?php } ?>

        <?php if ($comments != 0) { ?>
            <table class="table t1 table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">博客标题</th>
                    <th scope="col">评论</th>
                    <th scope="col">用户</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($comments as $comment) { ?>
                    <tr>
                        <th scope="row"><?=$comment['comment_id'] ?></th>
                        <td>
                            <a href="single_post.php?post_id=<?=$comment['post_id']?>">
                                <?php
                                    $p = getByIdDeep($conn, $comment['post_id']);
                                    echo $p['post_title'];
                                ?>
                            </a>
                        </td>
                        <td>
                            <?=$comment['comment']?>
                        </td>
                        <td>
                            <?php
                            $u = getUserById($conn, $comment['user_id']);
                            echo '@' . $u['username'];
                            ?>
                        </td>
                        <td>
                            <a href="comment-delete.php?comment_id=<?=$comment['comment_id'] ?>" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning">
                没有评论！
            </div>
        <?php } ?>
    </div>
    </section>
    </div>
    <script>
        let navList = document.getElementById('navList').children;
        navList.item(3).classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>