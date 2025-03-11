<?php
    if (isset($key) && $key == "hhdsfs1263z") {
?>
<input type="checkbox" id="checkbox">
<header class="header">
    <h2 class="u-name">我的 <b>博客</b>
        <label for="checkbox">
            <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
    </h2>
    <div class="d-flex align-items-center main-profile-link">
        <a href="profile.php">
            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
            <span>@<?php echo $_SESSION['username']; ?></span>
        </a>
    </div>

</header>
<div class="body">
    <nav class="side-bar">
        <div class="user-p">

        </div>
        <ul id="navList">
            <li>
                <a href="users.php">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>用户</span>
                </a>
            </li>
            <li>
                <a href="posts.php">
                    <i class="fa fa-wpforms" aria-hidden="true"></i>
                    <span>博客</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                    <span>目录</span>
                </a>
            </li>
            <li>
                <a href="comment.php">
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                    <span>评论</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>设置</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <span>登出</span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="section-1">
<?php
    }
?>