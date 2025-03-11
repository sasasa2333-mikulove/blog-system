<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>添加目录控制面板</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    ?>
    <div class="main-table">
        <h3 class="mb-3">创建目录
            <a href="category.php" class="btn btn-success">目录</a></h3>
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
        <form class="shadow p-3" action="req/category-create.php" method="post">

            <div class="mb-3">
                <label class="form-label">目录</label>
                <input type="text" class="form-control" name="category">
            </div>

            <button type="submit" class="btn btn-primary">创建</button>
        </form>


    </div>
    </section>
    </div>
    <script>
        let navList = document.getElementById('navList').children;
        navList.item(2).classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>