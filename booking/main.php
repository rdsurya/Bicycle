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
        <link href="../assets/css/jquery.flexdatalist.min.css" rel='stylesheet' type='text/css' />
        <link href="../assets/css/jquery.datetimepicker.css" rel='stylesheet' type='text/css' />
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
                        Manage Booking
                        <span class="pull-right">
                            <button class="btn btn-primary" id="btnAddModal"><i class="fa fa-plus-circle"></i> New Booking</button>
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
                        <li><a href="/Bicycle/entrance/logout.php">LOGOUT</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---->

        <!-- Add Modal Start -->
        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <h3 class="modal-title"><i class="fa fa-book"></i> Booking Information</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form class="form-horizontal" id="bookingForm">
                            <input type="hidden" id="s_modalID">

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Customer</label>
                                <div class="col-md-6">
                                    <input id="customerNo" type="text" placeholder="Search customer..." class="form-control input-md " required maxlength="10">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Bicycle</label>  
                                <div class="col-md-6">
                                    <input id="bicycleNo" name="name" type="text" placeholder="Search bicycle..." class="form-control input-md" required maxlength="50">
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Start Time</label>
                                <div class="col-md-6">
                                    <input id="startDate" name="nPwd" type="text" placeholder="Pick a time" class="form-control input-md" required maxlength="50">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">End Time</label>
                                <div class="col-md-6">
                                    <input id="endDate" type="text" placeholder="Pick a time" class="form-control input-md" required maxlength="15">
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic">Package</label>
                                <div class="col-md-4">
                                    <select id="package" name="selectbasic" class="form-control">

                                    </select>
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Price (RM)</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" placeholder="Enter booking price" class="form-control input-md" required min="0" max="9999.99" step="0.01">
                                </div>
                            </div>
                            
                        </form>

                        <form id="bookingForm2" class="form-horizontal update_save_btn">
                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic">Status</label>
                                <div class="col-md-4">
                                    <select id="status" name="selectbasic" class="form-control">
                                        <option value="New">New</option>
                                        <option value="Taken">Bicycle Taken</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Fine (RM)</label>
                                <div class="col-md-6">
                                    <input id="fine" type="number" placeholder="Enter fine charge if any..." class="form-control input-md" min="0" max="9999.99" step="0.01">
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Fine Reason</label>
                                <div class="col-md-6">
                                    <textarea id="fineReason" placeholder="Enter the fine reason" class="form-control input-md" maxlength="220"></textarea>
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
        <script type="text/javascript" src="../assets/js/jquery.flexdatalist.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.datetimepicker.full.min.js"></script>

        <script>

                                    $(function () {
                                        loadStaff();
                                        getPackList();
                                    });
                                    //---------------------- init flex datalist
                                    function initFlexSearch(elemID, url, value) {
                                        $(elemID).flexdatalist('destroy');
                                        $(elemID).val(value).flexdatalist({
                                            minLength: 0,
                                            searchIn: 'name',
                                            searchDelay: 300,
                                            selectionRequired: true,
                                            url: url,
                                            visibleProperties: ['name', 'value'],
                                            valueProperty: 'value',
                                            searchByWord: true
                                        });
                                    }

                                    //-------------- init dateTimePicker
                                    $('#startDate').datetimepicker({
                                        format: 'Y-m-d H:i',
                                        step: 5,
                                        timepicker: true
                                    });
                                    $('#endDate').datetimepicker({
                                        format: 'Y-m-d H:i',
                                        step: 5,
                                        timepicker: true
                                    });

                                    $('#startDate').on('change', function () {
                                        if ($('#endDate').val() && $('#startDate').val()) {
                                            var start = Date.parse($('#startDate').val()); //$('#startDate').datetimepicker('getValue');
                                            var end = Date.parse($('#endDate').val());//$('#endDate').datetimepicker('getValue');
                                            console.log("start:" + start + " end:" + end);
                                            if (start >= end) {
                                                alert("Start date must be earlier than end date!");
                                                $('#startDate').val('');
                                                return false;
                                            } else {
                                                calculatePrice();
                                            }
                                        }
                                    });

                                    $('#endDate').on('change', function () {
                                        if ($('#startDate').val() && $('#endDate').val()) {
                                            var start = Date.parse($('#startDate').val()); //$('#startDate').datetimepicker('getValue');
                                            var end = Date.parse($('#endDate').val());//$('#endDate').datetimepicker('getValue');
                                            console.log("start:" + start + " end:" + end);
                                            if (start >= end) {
                                                alert("End date must be later than start date!");
                                                $('#endDate').val('');
                                                return false;
                                            } else {
                                                calculatePrice();
                                            }
                                        }
                                    });

                                    $('#package').on('change', function () {
                                        calculatePrice();
                                    });

                                    function getPackList() {
                                        $.ajax({
                                            type: 'POST',
                                            url: "control/getListOfPackage.php",
                                            timeout: 60000,
                                            success: function (data, textStatus, jqXHR) {
                                                $('#package').html(data);
                                            }
                                        });
                                    }

                                    $('#btnAddModal').on('click', function () {
                                        s_clear();
                                        $('#bookingModal').modal('show');
                                        $('.update_save_btn').hide();
                                        $('#s_divSave').show();
                                        $('#bookingForm .form-control').prop("disabled", false);
                                        initFlexSearch("#customerNo", "control/searchCustomer.php", "");
                                        initFlexSearch("#bicycleNo", "control/searchBicycle.php", "");
                                        
                                    });
                                    $('#btnSaveStaff').on('click', function () {
                                        if (!$('#bookingForm')[0].checkValidity()) {
                                            $('<input type="submit">').hide().appendTo('#bookingForm').click().remove();
                                        } else {
                                            var data = {
                                                customer: $('#customerNo').val(),
                                                bicycle: $('#bicycleNo').val(),
                                                startDate: $('#startDate').val(),
                                                endDate: $('#endDate').val(),
                                                package: $('#package').val(),
                                                price: $('#price').val()
                                            };
                                            $.ajax({
                                                type: 'POST',
                                                url: "control/insertBooking.php",
                                                data: data,
                                                dataType: 'json',
                                                timeout: 60000,
                                                success: function (data, textStatus, jqXHR) {
//                                                    console.log(data);
                                                    if (data.valid) {
                                                        alert(data.msg);
                                                        $('#bookingModal').modal('hide');
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
                                            url: "control/tableBooking.php",
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
                                        $('#bookingForm')[0].reset();
                                        $('#bookingForm2')[0].reset();
                                    }

                                    $('#tableDiv').on('click', '#s_btnUpdateModal', function () {
                                        $('.update_save_btn').hide();
                                        $('#s_divUpdate').show();
                                        $('#bookingForm2').show();
                                        $('#bookingForm .form-control').prop("disabled", true);
                                        var hiden = $(this).closest('td').find('#s_obj').val();
                                        var obj = JSON.parse(hiden);
                                        $('#s_modalID').val(obj.booking_no);
                                        initFlexSearch("#customerNo", "control/searchCustomer.php", obj.customer_no);
                                        initFlexSearch("#bicycleNo", "control/searchBicycle.php", obj.bicycle_no);
                                        $('#startDate').val(obj.startDate);
                                        $('#endDate').val(obj.endDate);
                                        $('#price').val(obj.price);
                                        $('#status').val(obj.status);
                                        $('#fine').val(obj.fine);
                                        $('#fine_reason').val(obj.fine_reason);
                                        
                                        $('#bookingModal').modal('show');
                                        
                                    });
                                    $('#btnUpdateStaff').on('click', function () {
                                        if (!$('#bookingForm2')[0].checkValidity()) {
                                            $('<input type="submit">').hide().appendTo('#bookingForm2').click().remove();
                                        } else {
                                            var data = {
                                                id: $('#s_modalID').val(),
                                                fine: $('#fine').val(),
                                                fine_reason: $('#fineReason').val(),
                                                status: $('#status').val(),
                                                bike: $('#bicycleNo').val()
                                            };
                                            $.ajax({
                                                type: 'POST',
                                                url: "control/updateBooking.php",
                                                data: data,
                                                dataType: 'json',
                                                timeout: 60000,
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data.valid) {
                                                        alert(data.msg);
                                                        $('#bookingModal').modal('hide');
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
                                        var yes = confirm("Are you sure you want to delete booking record " + obj.booking_no +" for customer "+obj.name +"?");
                                        if (yes) {
                                            var data = {
                                                id: obj.booking_no,
                                                status: obj.status,
                                                bike: obj.bicycle_no
                                            };
                                            $.ajax({
                                                type: 'POST',
                                                url: "control/deleteBooking.php",
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
                                    //-------------- function to calculate duration in days between two dates
                                    function treatAsUTC(date) {
                                        var result = date;//new Date(date);
                                        result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
                                        return result;
                                    }

                                    function daysBetween(startDate, endDate) {
                                        var millisecondsPerDay = 24 * 60 * 60 * 1000;
                                        var x = (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
                                        
                                        var y = Math.ceil(x);
                                        
                                         return y;
                                    }

                                    function calculatePrice() {
                                        //get days of rent
                                        //get package days unit
                                        //x = days of rent / days unit, round up
                                        // price = x * package price
                                        if ($('#endDate').val() && $('#startDate').val() && $('#package').val()) {

                                            var rentDays = daysBetween($('#startDate').datetimepicker('getValue'), $('#endDate').datetimepicker('getValue'));
                                            var json = $('#package').val();
                                            console.log(json);
                                            var objP = JSON.parse(json);
                                            var dayUnit = objP.days;
                                            var x = Math.ceil((rentDays / dayUnit));
                                            var price = x * objP.price;

                                            $('#price').val(price);

                                        } else {
                                            return false;
                                        }

                                    }

                                    //alert(daysBetween($('#first').val(), $('#second').val()));

        </script>


    </body>

</html>

