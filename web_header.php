<?php
    if (isset($_SESSION['user_id'])) {
        $user_name = $_SESSION['user_name'];
    } else {
        $user_name = '';
    }

?>
<nav class="navbar navbar-expand-md justify-content-center fixed-top">
    <!-- Brand -->
    <div class="navbar-brand">
        <img src='admin/files/images/temp/avatar3.png' class='img-circle' alt='User Image'/>
    </div>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item <?php if ($name == 'index') echo 'active' ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?php if ($name == 'sys_courses') echo 'active' ?>">
                <a class="nav-link" href="flexi_courses.php">Flexi Courses</a>
            </li>
            <li class="nav-item <?php if ($name == 'user_courses') echo 'active' ?>">
                <a class="nav-link" href="user_courses.php">My Courses</a>
            </li>
            <li class="nav-item <?php if ($name == 'tutor_courses') echo 'active' ?>">
                <a class="nav-link" href="tutor_courses.php">Tutor Courses</a>
            </li>
            <li class="nav-item <?php if ($name == '') echo 'active' ?>">
                <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item <?php if ($name == '') echo 'active' ?>">
                <a class="nav-link" href="user_settings.php">Account</a>
            </li>
            <li class="nav-item <?php if ($name == '') echo 'active' ?>">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>

<div style="height: 48px"></div>