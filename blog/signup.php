<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>注册</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <form class="shadow w-450 p-3" action="php/signup.php" method="post">
                <h4 class="display-4  fs-1">创建账户</h4><br>
                    <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
                    <?php } ?>
                    <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
                    <?php } ?>
                <div class="mb-3">
                    <label class="form-label">姓名</label>
                    <input type="text" class="form-control" name="fname" value="<?php echo (isset($_GET['fname']))?htmlspecialchars($_GET['fname']):"" ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">用户名</label>
                    <input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname']))?htmlspecialchars($_GET['uname']):"" ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">密码</label>
                    <input type="password" class="form-control" name="pass">
                </div>

                <button type="submit" class="btn btn-primary">注册</button>
                <a href="login.php" class="link-secondary">登录</a>
            </form>
        </div>
    </body>
</html>