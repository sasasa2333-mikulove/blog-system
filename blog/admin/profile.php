<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>用户控制面板</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/side-bar.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?php
    $key = "hhdsfs1263z";
    include "inc/side-nav.php";
    include_once("data/admin.php");
    include_once("../db_conn.php");
    $admin = getById($conn, $_SESSION['admin_id']);
    ?>
    <div class="main-table">
        <h3 class="mb-3">管理员账户信息</h3>
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
        <form class="shadow p-3" action="req/admin-edit.php" method="post">
            <h3>修改账户信息</h3>
            <div class="mb-3">
                <label class="form-label">名</label>
                <input type="text" class="form-control" name="fname" value="<?=$admin['first_name']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">姓</label>
                <input type="text" class="form-control" name="lname" value="<?=$admin['last_name']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">用户名</label>
                <input type="text" class="form-control" name="username" value="<?=$admin['username']?>">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>

        <form class="shadow p-3 mt-5" action="req/admin-edit-pass.php" method="post">
            <h3>修改密码</h3>
            <div class="mb-3">
                <label class="form-label">旧密码</label>
                <input type="password" class="form-control" name="cpass">
            </div>
            <div class="mb-3">
                <label class="form-label">新密码</label>
                <input type="password" class="form-control" name="new_pass">
            </div>
            <div class="mb-3">
                <label class="form-label">确认密码</label>
                <input type="password" class="form-control" name="cnew_pass">
            </div>
            <button type="submit" class="btn btn-primary">修改密码</button>
        </form>


    </div>
    </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>