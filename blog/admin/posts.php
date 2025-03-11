<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>博客控制面板</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    include_once("data/post.php");
    include_once("data/comment.php");
    include_once("../db_conn.php");
    $posts = getAllDeep($conn);
    ?>
    <div class="main-table">
        <h3 class="mb-3">所有博客
            <a href="post-add.php" class="btn btn-success">添加</a></h3>
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

        <?php if ($posts != 0) { ?>
            <table class="table t1 table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>标题</th>
                    <th>目录</th>
                    <th>评论</th>
                    <th>点赞</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($posts as $post) {
                    $category = getCategoryById($conn,$post['category']);
                ?>
                    <tr>
                        <th scope="row"><?=$post['post_id'] ?></th>
                        <td>
                            <a href="single_post.php?post_id=<?=$post['post_id'] ?>"><?=$post['post_title'] ?></a>
                        </td>
                        <td>
                            <?=$category['category']?>
                        </td>
                        <td>
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <?php
                                echo countByPostId($conn,$post['post_id']);
                            ?>
                        </td>
                        <td>
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            <?php
                                echo likeCountByPostId($conn,$post['post_id']);
                            ?>
                        </td>
                        <td>
                            <a href="post-delete.php?post_id=<?=$post['post_id'] ?>" class="btn btn-danger">删除</a>
                            <a href="post-edit.php?post_id=<?=$post['post_id'] ?>" class="btn btn-warning">修改</a>
                            <?php if ($post['publish'] == 1) { ?>
                                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link disabled">公开</a>
                                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link">私密</a>
                            <?php } else { ?>
                                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link">公开</a>
                                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link disabled">私密</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning">
                没有博客！
            </div>
        <?php } ?>
    </div>
    </section>
    </div>
    <script>
        let navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>