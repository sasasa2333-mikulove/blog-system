<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="blog.php">
            <b>我的<span style="color: #0088FF;">博客</span></b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">博客</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">目录</a>
                </li>
                <?php
                if ($logged) {
                    ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>@<?=$_SESSION['username']?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">登出</a></li>
                    </ul>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">登录 | 注册</a>
                </li>
                <?php } ?>
            </ul>
            <form class="d-flex" role="search" method="GET" action="blog.php">
                <input class="form-control me-2" type="search" name="search" placeholder="搜索" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">搜索</button>
            </form>
        </div>
    </div>
</nav>