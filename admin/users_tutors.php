<?php
    $name = 'users_tutors';
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Dashboard</title>

        <?php require_once 'sys_links.php' ?>
    </head>
    <body>
        <?php require_once 'sys_header.php' ?>

        <div class='container-fluid mx-0 p-0'>
            <div class='row m-0 p-0'>
                <div class='col-12 col-sm-4 col-md-3 col-lg-2 p-3 text-center' id='side_navbar'>
                    <?php require_once 'sys_sidebar_nav.php' ?>
                </div>
                <div class='col-12 col-sm-8 col-md-9 col-lg-10 px-0'>
                    <div class='row mx-0'>
                        <div class='col-12 col-lg-8 p-1 content_column'>
                            <div class="box box-primary h-100">
                                <div class="box-header">
                                    <i class="fas fa-user-graduate"></i>
                                    <h3 class="box-title">Registered students</h3>
                                </div>

                                <div class="box-body table-responsive" style='height: calc(100% - 60px); overflow-y: auto'>
                                    <table class="table table-bordered table-striped table-hover table-sm">
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th style='width: 60px' class='text-center'>No.</th>
                                                <th class='d-none'>Student ID</th>
                                                <th>Student Name</th>
                                                <th style='width: 80px'>Gender</th>
                                                <th style='width: 50px' class='text-center'>Age</th>
                                                <th style='width: 160px'>Country</th>
                                                <th style='width: 160px'>Province</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='col-12 col-lg-4 p-1 content_column'>
                            <div class="box box-info h-100">
                                <div class="box-header">
                                    <i class="fas fa-info"></i>
                                    <h3 class="box-title">Student Information</h3>
                                </div>

                                <div class="box-body table-responsive" style='height: calc(100% - 60px); overflow-y: auto'>
                                    <div class='info_user_header'>
                                        <img src='files/images/temp/avatar5.png' class='img-circle' alt='User Image'/>
                                        <p>Jane Doe
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </div>

                                    <table class="table table-sm info_table mt-2">
                                        <tbody>
                                            <tr>
                                                <td class='info_header'>First Name</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Last Name</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Otder Name</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Gender</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Date of Birth</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Contact Address</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Email Address</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Country</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>Province or region</td>
                                                <td class='table_info'></td>
                                            </tr>
                                            <tr>
                                                <td class='info_header'>District (locality)</td>
                                                <td class='table_info'></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'sys_footer.php' ?>
    </body>
</html>
