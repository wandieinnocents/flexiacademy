<!-- header logo: style can be found in header.less -->
<header>
    <div class='row mx-0'>
        <div class='col-12 col-sm-4 col-md-3 col-lg-2 px-0 text-center' id='header_logo'>
            <a href='index.php'>
                FlexiStudy
            </a>
        </div>
        <div class='col-12 col-sm-8 col-md-9 col-lg-10 px-0' id='header_content'>
            <nav class='navbar navbar-expand-md'>
                <button class='navbar-toggler' type='button' data-toggle='#side_navbar' aria-controls='navbarSupportedContent'
                        aria-expanded='false'
                        aria-label='Toggle Navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <ul class='navbar-nav mx-auto'>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle menu' data-toggle='dropdown'>
                            <i class='fas fa-user'></i>
                            <span>Jane Doe <i class='caret'></i></span>
                        </a>
                        <ul class='dropdown-menu nav_dropdown'>
                            <!-- User image -->
                            <li id='user_header'>
                                <img src='files/images/temp/avatar3.png' class='img-circle' alt='User Image'/>
                                <p>
                                    Jane Doe - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li id='user_footer'>
                                <div>
                                    <a href='#' class='btn btn-default btn-flat'>Profile</a>
                                </div>
                                <div>
                                    <a href='../index.php?logout=true' class='btn btn-default btn-flat'>Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>