<?php
    $name = 'index';
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>FlexiStudy | Dashboard</title>

        <?php require_once 'sys_links.php' ?>
        <link href='files/lib/css/admin/dashboard.css' rel='stylesheet' type='text/css'/>
        <link href='files/lib/css/jquery-jvectormap-1.2.2.css' rel='stylesheet' type='text/css'/>
        <link href='files/lib/css/daterangepicker-bs3.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <?php require_once 'sys_header.php' ?>

        <div class='container-fluid mx-0 p-0'>
            <div class='row m-0 p-0'>
                <div class='col-12 col-sm-4 col-md-3 col-lg-2 p-3 text-center' id='side_navbar'>
                    <?php require_once 'sys_sidebar_nav.php' ?>
                </div>

                <div class='col-12 col-sm-8 col-md-9 col-lg-10 px-0' id='content_data'>
                    <section class="section_header">
                        <h1>Dashboard
                            <small>Control panel</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fas fa-archive"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </section>

                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-0">
                        <div class="col-6 col-md-2 offset-md-1 p-1">
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Video Tutorials</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-video"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-6 col-md-2 p-1">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>1560</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file-pdf"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 p-1">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>53</h3>
                                    <p>Registered Tutors</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 p-1">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-4 col-md-2 p-1">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-friends"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class='row mx-0 mt-3'>
                        <!-- Map box -->
                        <div class='col-12 col-lg-6 p-1'>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="float-right box-tools">
                                        <button class="btn btn-primary btn-sm daterange float-right" data-toggle="tooltip"
                                                title="Date range">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </div>

                                    <i class="fas fa-user-friends"></i>
                                    <h3 class="box-title">Visitors</h3>
                                </div>

                                <div class="box-body">
                                    <div id="world-map" style="height: 300px;"></div>
                                </div>
                                <div class="box-footer text-center">
                                    <button class="btn btn-info"><i class="fa fa-download"></i> Generate PDF</button>
                                </div>
                            </div>
                        </div>

                        <div class='col-12 col-lg-6 p-1'>
                            <div class="box box-primary">
                                <div class="box-body" style='height: 430px; overflow-y: auto'>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover table-sm">
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th>Country</th>
                                                    <th class='text-center'>Visitors</th>
                                                    <th class='text-center'>Online</th>
                                                    <th class='text-center'>Page Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    for ($count = 0; $count < 120; $count++) {
                                                        $spark = rand(1, 6);
                                                        $country = array('USA', 'CHINA', 'EUROPE', 'AFRICA', 'S.AMERICA')[rand(0, 4)];
                                                        $visits = rand(0, 800);
                                                        $pages = $visits * rand(2, 5);
                                                        echo <<<EOT
                                                            <tr>
                                                                <td><a href='#'>$country</a></td>
                                                                <td class='text-center'>
                                                                    <div class='text-center sparkline-$spark'></div>
                                                                </td>
                                                                <td class='text-center'>$visits</td>
                                                                <td class='text-center'>$pages</td>
                                                            </tr>
EOT;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'sys_footer.php' ?>

        <!-- jvectormap -->
        <script src="files/lib/js/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="files/lib/js/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="files/lib/js/daterangepicker.js" type="text/javascript"></script>
        <script src="files/lib/js/jquery.sparkline.js" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                //jvectormap data
                var visitorsData = {
                    "US": 398, //USA
                    "SA": 400, //Saudi Arabia
                    "CA": 1000, //Canada
                    "DE": 500, //Germany
                    "FR": 760, //France
                    "CN": 300, //China
                    "AU": 700, //Australia
                    "BR": 600, //Brazil
                    "IN": 800, //India
                    "GB": 320, //Great Britain
                    "RU": 3000 //Russia
                };
                //World map by jvectormap
                $('#world-map').vectorMap({
                    map: 'world_mill_en',
                    backgroundColor: "#fff",
                    regionStyle: {
                        initial: {
                            fill: '#e4e4e4',
                            "fill-opacity": 1,
                            stroke: 'none',
                            "stroke-width": 0,
                            "stroke-opacity": 1
                        }
                    },
                    series: {
                        regions: [{
                            values: visitorsData,
                            scale: ["#3c8dbc", "#2D79A6"], //['#3E5E6B', '#A6BAC2'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    onRegionLabelShow: function (e, el, code) {
                        if (typeof visitorsData[code] != "undefined")
                            el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
                    }
                });

                $('.daterange').daterangepicker(
                    {
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                            'Last 7 Days': [moment().subtract('days', 6), moment()],
                            'Last 30 Days': [moment().subtract('days', 29), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                        },
                        startDate: moment().subtract('days', 29),
                        endDate: moment()
                    },
                    function (start, end) {
                        alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }
                );

                //Sparkline charts
                var myvalues = [15, 19, 20, -22, -33, 27, 31, 27, 19, 30, 21];
                $('.sparkline-1').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
                myvalues = [15, 19, 20, 22, -2, -10, -7, 27, 19, 30, 21];
                $('.sparkline-2').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
                myvalues = [15, -19, -20, 22, 33, 27, 31, 27, 19, 30, 21];
                $('.sparkline-3').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
                myvalues = [15, 19, 20, 22, 33, -27, -31, 27, 19, 30, 21];
                $('.sparkline-4').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
                myvalues = [15, 19, 20, 22, 33, 27, 31, -27, -19, 30, 21];
                $('.sparkline-5').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
                myvalues = [15, 19, -20, 22, -13, 27, 31, 27, 19, 30, 21];
                $('.sparkline-6').sparkline(myvalues, {
                    type: 'bar',
                    barColor: '#00a65a',
                    negBarColor: "#f56954",
                    height: '20px'
                });
            });
        </script>
    </body>
</html>
