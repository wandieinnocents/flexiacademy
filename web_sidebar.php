<?php
    if (isset($_SESSION['user_id'])) {
        $user_name = $_SESSION['user_name'];
        $status = 'Online';
        $color = 'text-success';
    } else {
        $user_name = '';
        $status = 'Offline';
        $color = 'text-red';
    }

?>
<div id='user_panel'>
    <div class='float-left image'>
        <img src='admin/files/images/temp/avatar3.png' class='img-circle' alt='User Image'/>
    </div>
    <div class='float-left info'>
        <p><?php echo $user_name ?></p>
        <a href='javascript:void()'><i class='fa fa-circle <?php echo $color ?>'></i> <?php echo $status ?></a>
    </div>
    <div class='clearfix'></div>
</div>

<ul id='flexi_menu'>
    <li>
        <span>Flexi Study</span>
        <ul>
            <li class='<?php echo $name == 'index' ? 'active' : '' ?>'>
                <a href='index.php'>
                    <i class='fas fa-archive'></i>
                    <span>Flexi Home</span>
                </a>
            </li>

            <li class='<?php echo $name == 'sys_courses' ? 'active' : '' ?>'>
                <a href='flexi_courses.php'>
                    <i class='fas fa-user-graduate'></i>
                    <span>Flexi Courses</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <span>Flexi Account</span>
        <ul>
            <?php
                if (isset($_SESSION['user_id'])) { ?>
                    <li class='<?php echo $name == 'admin_account' ? 'active' : '' ?>'>
                        <a href='admin/index.php'>
                            <i class='fas fa-user-plus'></i>
                            <span>Admin Account</span>
                        </a>
                    </li>

                    <li class='<?php echo $name == 'user_courses' ? 'active' : '' ?>'>
                        <a href='user_courses.php'>
                            <i class='fas fa-chalkboard'></i>
                            <span>My Courses</span>
                        </a>
                    </li>

                    <li class='<?php echo $name == 'user_settings' ? 'active' : '' ?>'>
                        <a href='user_settings.php'>
                            <i class='fas fa-cogs'></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li class='d-none <?php echo $name == 'user_help' ? 'active' : '' ?>'>
                        <a href='user_help.php'>
                            <i class='fas fa-info'></i>
                            <span>Help Center</span>
                        </a>
                    </li>

                    <li>
                        <a href='javascript:void()' data-toggle="modal" id='sign_out_user' title='Sign out <?php echo $user_name ?>'>
                            <i class='fas fa-sign-out-alt'></i>
                            <span><?php echo $user_name ?></span>
                        </a>
                    </li>

                <?php } else { ?>
                    <li>
                        <a href='javascript:void()' data-toggle="modal" data-target="#login_modal">
                            <i class='fas fa-sign-in-alt'></i>
                            <span>Login Account</span>
                        </a>
                    </li>
                <?php }
            ?>

        </ul>
    </li>
</ul>