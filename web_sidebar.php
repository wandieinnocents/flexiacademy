<div id='user_panel'>
    <div class='float-left image'>
        <img src='admin/files/images/temp/avatar3.png' class='img-circle' alt='User Image'/>
    </div>
    <div class='float-left info'>
        <p>Hello, Jane</p>
        <a href='javascript:void()'><i class='fa fa-circle text-success'></i> Online</a>
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

            <li class='<?php echo $name == 'user_profile' ? 'active' : '' ?>'>
                <a href='user_profile.php'>
                    <i class='fas fa-user-friends'></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li class='<?php echo $name == 'user_profile' ? 'active' : '' ?>'>
                <a href='user_profile.php'>
                    <i class='fas fa-cogs'></i>
                    <span>Settings</span>
                </a>
            </li>

            <li class='<?php echo $name == 'user_profile' ? 'active' : '' ?>'>
                <a href='user_profile.php'>
                    <i class='fas fa-info'></i>
                    <span>Help Center</span>
                </a>
            </li>

            <li class='<?php echo $name == 'user_login' ? 'active' : '' ?>'>
                <a href='user_login.php'>
                    <i class='fas fa-sign-in-alt'></i>
                    <span>Login Account</span>
                </a>
            </li>
        </ul>
    </li>
</ul>