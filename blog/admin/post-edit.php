<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>修改博客控制面板</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">


        <link rel="stylesheet" href="../css/richtext.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
    </head>
    <body>
    <?php
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    include_once("data/post.php");
    include_once("../db_conn.php");
    $post_id = $_GET['post_id'];
    $cover_url = $_GET['cover_url'];
    $post = getById($conn, $post_id);
    $categories = getAllCategories($conn);
    ?>
    <div class="main-table">
        <h3 class="mb-3">修改博客
            <a href="posts.php" class="btn btn-secondary">发布</a></h3>
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
        <form class="shadow p-3" action="req/post-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?=htmlspecialchars($post_id)?>">
            <input type="hidden" name="cover_url" value="<?=htmlspecialchars($cover_url)?>">
            <div class="mb-3">
                <label class="form-label">标题</label>
                <input type="text" class="form-control" name="title" value="<?=$post['post_title']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">封面</label>
                <input type="file" class="form-control" name="cover">
                <img src="../upload/blog/<?=$post['cover_url']?>" width="200">
            </div>

            <div class="mb-3">
                <label class="form-label">内容</label>
                <textarea class="form-control text" name="text"><?=$post['post_text']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">目录</label>
                <select name="category" class="form-control">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?=$category['id']?>"<?php echo ($category['id'] == $post['category']) ? "selected" : "" ?>><?=$category['category']?></option>\
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">发布</button>
        </form>

    </div>
    </section>
    </div>
    <script>
        let navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");
        $(document).ready(function() {
            $('.text').richText();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>