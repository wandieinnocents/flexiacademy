<?php
    if (isset($_SESSION['user_id'])) {
        $user_name = $_SESSION['user_name'];
    } else {
        $user_name = '';
    }

?>
<nav class="navbar navbar-expand-md justify-content-center fixed-top">
    <?php
        if (isset($_SESSION['user_id'])) {
            $user_name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
            $email_address = $_SESSION['email_address'];
            $profile_picture = 'admin/files/images/avators/';
            if (empty($_SESSION['profile_picture'])) {
                $profile_picture = $profile_picture . 'user_avatar.png';
            } else {
                if ($_SESSION['user_account'] == 'google.com') {
                    $profile_picture = $_SESSION['profile_picture'];
                } elseif ($_SESSION['user_account'] == 'flexi_account') {
                    $profile_picture = $profile_picture . $_SESSION['profile_picture'];
                } elseif ($_SESSION['user_account'] == 'facebook.com') {
                    $profile_picture = $_SESSION['profile_picture'] . '?type=small';
                }
            }

            echo <<<EOT
                    <div class="navbar-brand">
                        <img src='$profile_picture' class='img-circle' alt=''/>
                    </div>
                    <div class="dropdown" id="header_user">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <div>$user_name</div>
                            <div>$email_address</div>
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">View Profile</a>
                            <a class="dropdown-item" href="javascript:void()" id="logout">Logout</a>
                        </div>
                    </div>
EOT;
        } else { ?>
            <div id="get_started">
                <span data-toggle="modal" data-target="#login_modal">GET STARTED</span>
            </div>
        <?php }
    ?>

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
            <?php
                if (isset($_SESSION['user_id'])) {
                    echo <<<EOT
                        <li class="nav-item <?php if ($name == 'user_courses') echo 'active' ?>">
                            <a class="nav-link" href="user_courses.php">My Courses</a>
                        </li>
                        <li class="nav-item <?php if ($name == 'tutor_courses') echo 'active' ?>">
                            <a class="nav-link" href="tutor_courses.php">Tutor Courses</a>
                        </li>
EOT;

                }
            ?>
            <li class="nav-item <?php if ($name == '') echo 'active' ?>">
                <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item <?php if ($name == '') echo 'active' ?>">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>

<div style="height: 48px"></div>