<div id='user_panel'>
    <div class='float-left image'>
        <img src='files/images/temp/avatar3.png' class='img-circle' alt='User Image'/>
    </div>
    <div class='float-left info'>
        <p>Hello, Jane</p>
        <a href='javascript:void()'><i class='fa fa-circle text-success'></i> Online</a>
    </div>
    <div class='clearfix'></div>
</div>

<form action='#' method='get' id='sidebar_form'>
    <div class='input-group'>
        <input type='text' name='q' class='form-control' placeholder='Search...'/>
        <span class='input-group-btn'>
                    <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
                </span>
    </div>
</form>

<ul id='sidebar_menu'>
    <li class='<?php echo $name == 'index' ? 'active' : '' ?>'>
        <a href='index.php'>
            <i class='fas fa-archive'></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class='<?php echo $name == 'users_students' ? 'active' : '' ?>'>
        <a href='users_students.php'>
            <i class='fas fa-user-graduate'></i>
            <span>Registered Students</span>
        </a>
    </li>

    <li class='<?php echo $name == 'users_tutors' ? 'active' : '' ?>'>
        <a href='users_tutors.php'>
            <i class='fas fa-chalkboard'></i>
            <span>Registered Tutors</span>
        </a>
    </li>

    <li class='<?php echo $name == 'users_visitors' ? 'active' : '' ?>'>
        <a href='users_visitors.php'>
            <i class='fas fa-user-friends'></i>
            <span>Anonymous Visitors</span>
        </a>
    </li>

    <li class='<?php echo $name == 'tutorials_documents' ? 'active' : '' ?>'>
        <a href='tutorials_documents.php'>
            <i class='fas fa-file-pdf'></i>
            <span>Document tutorials</span>
        </a>
    </li>

    <li class='<?php echo $name == 'tutorials_media' ? 'active' : '' ?>'>
        <a href='tutorials_media.php'>
            <i class='fas fa-file-video'></i>
            <span>Media tutorials</span>
        </a>
    </li>

    <li class='<?php echo $name == 'calendar' ? 'active' : '' ?>'>
        <a href='calendar.php'>
            <i class='fas fa-calendar'></i>
            <span>Calendar</span>
            <small class='badge bg-info'>3</small>
        </a>
    </li>

    <li class='<?php echo $name == 'mailbox' ? 'active' : '' ?>'>
        <a href='mailbox.php'>
            <i class='fas fa-envelope'></i>
            <span>Mailbox</span>
            <small class='badge bg-info'>12</small>
        </a>
    </li>
</ul>