<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: ../entrance/login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
        <!--favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon.ico/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon.ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon.ico/favicon-16x16.png">
        <link rel="manifest" href="../assets/favicon.ico/manifest.json">
        <link rel="mask-icon" href="../assets/favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="../assets/favicon.ico/favicon.ico">
        <meta name="msapplication-config" content="../assets/favicon.ico/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <!--favicon-->

        <!-- jQuery (Bootstrap's JavaScript plugins) -->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="../assets/css/dataTables.bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="../assets/css/buttons.bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
        <!--webfont-->
        <!-- dropdown -->
        <script src="../assets/js/jquery.easydropdown.js"></script>
        <link href="../assets/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="../assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="../assets/js/scripts.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!--js-->
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="../assets/js/move-top.js"></script>
        <script type="text/javascript" src="../assets/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
                });
            });
        </script>
        <!---- start-smoth-scrolling---->


    </head>
    <body>
        <!--banner-->
        <script src="../assets/js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <div class="banner-bg banner-bg1">	
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <a href="../entrance/home.php"><img src="../assets/images/UTeM_s.png" alt=""/></a><br/><br/>
                        <h3 style="text-align: center; color:white;">Welcome,<br/><?= $_SESSION["name"] ?></h3>
                    </div>							 
                    <!--top menu here-->
                    <?php include '../navbar/topMenu.php'; ?>
                    <!--top menu end-->
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container" style="background: white; width: 85%;">
                <div class="row" style="padding: 10px;">
                    <h3 style="padding: 5px;">
                        Manage Bicycle
                        <span class="pull-right">
                            <button class="btn btn-primary" id="btnAddModal"><i class="fa fa-plus-circle"></i> New Bicycle</button>
                        </span>
                    </h3>
                    <div class="table-responsive" id="tableDiv"></div>
                </div>
            </div>
        </div>
        <!--/banner-->

        <div class="footer">
            <div class="container wrap">
                <div class="logo2">
                    <a href="index.html"><img src="../assets/images/logo2.png" alt=""/></a>
                </div>
                <div class="ftr-menu">
                    <ul>
                        <li><a href="bicycles.html">BICYCLES</a></li>
                        <li><a href="parts.html">PARTS</a></li>
                        <li><a href="accessories.html">ACCESSORIES</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---->

        <!-- Add Modal Start -->
        <div class="modal fade" id="bicycleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <h3 class="modal-title"><i class="fa fa-bicycle"></i> Bicycle Information</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form class="form-horizontal" id="bicycleForm">
                            <input type="hidden" id="s_modalID">

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Bicycle No</label>
                                <div class="col-md-6">
                                    <input id="s_byID" name="nPwd" type="text" placeholder="Enter bicycle matric number" class="form-control input-md" required maxlength="25">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Type</label>  
                                <div class="col-md-6">
                                    <input id="s_type" name="name" type="text" placeholder="Enter bicycle name" class="form-control input-md" required maxlength="25">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Model</label>
                                <div class="col-md-6">
                                    <input id="s_model" name="nPwd" type="text" placeholder="Enter bicycle email" class="form-control input-md" required maxlength="25">
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic">Status</label>
                                <div class="col-md-4">
                                    <select id="s_status" name="selectbasic" class="form-control">
                                        <option value="Available">Available</option>
                                        <option value="Occupied">Occupied</option>
                                    </select>
                                </div>
                            </div>


                        </form>
                        <div class="text-center">
                            <span class="update_save_btn" id="s_divSave">
                                <button id="btnSaveStaff" type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                            </span>
                            <span class="update_save_btn" style="display: none;" id="s_divUpdate">
                                <button id="btnUpdateStaff" type="button" class="btn btn-success"><i class="fa fa-pencil-square"></i> Update</button>
                            </span>
                            &nbsp;
                            <span>
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="s_clear()"><i class="fa fa-times"></i> Close</button>
                            </span>

                        </div>

                        <!-- content goes here -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Modal End -->  

        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../assets/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="../assets/js/jszip.min.js"></script>
        <script type="text/javascript" src="../assets/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="../assets/js/vfs_fonts.js"></script>

        <script>

                                    $(function () {
                                        loadStaff();
                                    });

                                    $('#btnAddModal').on('click', function () {
                                        $('#bicycleModal').modal('show');
                                        $('.update_save_btn').hide();
                                        $('#s_divSave').show();
                                        s_clear();
                                    });

                                    $('#btnSaveStaff').on('click', function () {
                                        if (!$('#bicycleForm')[0].checkValidity()) {
                                            $('<input type="submit">').hide().appendTo('#bicycleForm').click().remove();
                                        } else {
                                            var data = {
                                                bicycleID: $('#s_byID').val(),
                                                type: $('#s_type').val(),
                                                model: $('#s_model').val(),
                                                status: $('#s_status').val()
                                            };

                                            $.ajax({
                                                type: 'POST',
                                                url: "control/insertBicycle.php",
                                                data: data,
                                                dataType: 'json',
                                                timeout: 60000,
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data.valid) {
                                                        alert(data.msg);
                                                        $('#bicycleModal').modal('hide');
                                                        s_clear();
                                                        loadStaff();
                                                    } else {
                                                        alert(data.msg);
                                                    }
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    alert("Oops! " + errorThrown);
                                                }
                                            });
                                        }
                                    });

                                    function loadStaff() {
                                        $.ajax({
                                            type: 'POST',
                                            url: "control/tableBicycle.php",
                                            timeout: 60000,
                                            success: function (data, textStatus, jqXHR) {
                                                $('#tableDiv').html(data);
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                $('#tableDiv').html("Oops! " + errorThrown);
                                            }
                                        });
                                    }

                                    function s_clear() {
                                        $('#bicycleForm')[0].reset();
                                    }

                                    $('#tableDiv').on('click', '#s_btnUpdateModal', function () {
                                        $('.update_save_btn').hide();
                                        $('#s_divUpdate').show();
                                        var hiden = $(this).closest('td').find('#s_obj').val();
                                        var obj = JSON.parse(hiden);

                                        $('#s_modalID').val(obj.bicycleID);
                                        $('#s_type').val(obj.type);
                                        $('#s_model').val(obj.model);
                                        $('#s_status').val(obj.status);
                                        $('#s_byID').val(obj.bicycleID);

                                        $('#bicycleModal').modal('show');


                                    });

                                    $('#btnUpdateStaff').on('click', function () {
                                        if (!$('#bicycleForm')[0].checkValidity()) {
                                            $('<input type="submit">').hide().appendTo('#bicycleForm').click().remove();
                                        } else {
                                            var data = {
                                                bicycleID: $('#s_byID').val(),
                                                type: $('#s_type').val(),
                                                model: $('#s_model').val(),
                                                status: $('#s_status').val(),
                                                id: $('#s_byID').val()
                                            };

                                            $.ajax({
                                                type: 'POST',
                                                url: "control/updateBicycle.php",
                                                data: data,
                                                dataType: 'json',
                                                timeout: 60000,
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data.valid) {
                                                        alert(data.msg);
                                                        $('#bicycleModal').modal('hide');
                                                        s_clear();
                                                        loadStaff();
                                                    } else {
                                                        alert(data.msg);
                                                    }
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    alert("Oops! " + errorThrown);
                                                }
                                            });
                                        }
                                    });

                                    $('#tableDiv').on('click', '#s_btnDelete', function () {
                                        var hiden = $(this).closest('td').find('#s_obj').val();
                                        var obj = JSON.parse(hiden);

                                        var yes = confirm("Are you sure you want to delete bicycle " + obj.bicycleID+", model "+obj.model+"?");

                                        if (yes) {
                                            var data = {
                                                id: obj.bicycleID
                                            };

                                            $.ajax({
                                                type: 'POST',
                                                url: "control/deleteBicycle.php",
                                                data: data,
                                                dataType: 'json',
                                                timeout: 60000,
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data.valid) {
                                                        alert(data.msg);
                                                        loadStaff();
                                                    } else {
                                                        alert(data.msg);
                                                    }
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    alert("Oops! " + errorThrown);
                                                }
                                            });
                                        }
                                    });

        </script>


    </body>

</html>

