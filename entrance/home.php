<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
        
        <!-- jQuery (Bootstrap's JavaScript plugins) -->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
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
                        <a href="index.html"><img src="../assets/images/logo.png" alt=""/></a><br/><br/>
                        <h3 style="text-align: center; color:white;">Welcome,<br/><?= $_SESSION["name"] ?></h3>
                    </div>							 
                    <div class="top-nav">										 
                        <label class="mobile_menu" for="mobile_menu">
                            <span>Menu</span>
                        </label>
                        <input id="mobile_menu" type="checkbox">
                        <ul class="nav">
                            <li class="dropdown1"><a href="bicycles.html">BICYCLES</a>
                                <ul class="dropdown2">
                                    <li><a href="bicycles.html">FIXED / SINGLE SPEED</a></li>
                                    <li><a href="bicycles.html">CITY BIKES</a></li>
                                    <li><a href="bicycles.html">PREMIMUN SERIES</a></li>												
                                </ul>
                            </li>
                            <li class="dropdown1"><a href="parts.html">PARTS</a>
                                <ul class="dropdown2">
                                    <li><a href="parts.html">CHAINS</a></li>
                                    <li><a href="parts.html">TUBES</a></li>
                                    <li><a href="parts.html">TIRES</a></li>
                                    <li><a href="parts.html">DISC BREAKS</a></li>
                                </ul>
                            </li>      
                            <li class="dropdown1"><a href="">MANAGEMENT</a>
                                <ul class="dropdown2">
                                    <li><a href="Registration.html">REGISTER</a></li>
                                    <li><a href="Registration.html">BOOKING</a></li>
                                    <li><a href="Registration.html">LIST</a></li>
                                    <li><a href="Registration.html">JERSEYS</a></li>
                                </ul>
                            </li>               
                            <li class="dropdown1">
                                <a href="">PROFILE</a>
                                <ul class="dropdown2">
                                    <li><a id="btnPwdModal" style="cursor: pointer;"><i class="fa fa-key"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <a class="shop" href="cart.html"><img src="../assets/images/cart.png" alt=""/></a>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>	 
            <div class="caption">
                <div class="slider">
                    <div class="callbacks_container">
                        <ul class="rslides" id="slider">
                            <li><h1>HANDMADE BICYCLE</h1></li>
                            <li><h1>SPEED BICYCLE</h1></li>	
                            <li><h1>MOUNTAIN BICYCLE</h1></li>	
                        </ul>
                        <p>You <span>create</span> the <span>journey,</span> we supply the <span>parts</span></p>
                        <a class="morebtn" href="bicycles.html">SHOP BIKES</a>
                    </div>
                </div>
            </div>
            <div class="dwn">
                <a class="scroll" href="#cate"><img src="../assets/images/scroll.png" alt=""/></a>
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
        <div class="modal fade" id="chahngePWD_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <h3 class="modal-title"><i class="fa fa-key"></i> Change Password</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form class="form-horizontal" id="pwdForm">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Current Password</label>  
                                <div class="col-md-6">
                                    <input id="cPwd" name="name" type="password" placeholder="Enter your current password" class="form-control input-md" required >

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">New Password</label>
                                <div class="col-md-6">
                                    <input id="nPwd" name="nPwd" type="password" placeholder="Enter your new password" class="form-control input-md" required minlength="5" maxlength="11">
                                </div>
                            </div>
                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">Retype Password</label>
                                <div class="col-md-6">
                                    <input id="rPwd" name="rPwd" type="password" placeholder="Retype your new password" class="form-control input-md" required minlength="5" maxlength="11">
                                </div>
                            </div>

                        </form>
                        <div class="text-center">
                            <span>
                                <button id="btnSave" type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                            </span>
                            &nbsp;
                            <span>
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear()"><i class="fa fa-times"></i> Close</button>
                            </span>

                        </div>

                        <!-- content goes here -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Modal End -->  

    </body>
    
    <script>
        function clear(){
            $('#pwdForm')[0].reset();
        }
        
        $('#btnPwdModal').on('click', function(){
            $('#chahngePWD_modal').modal('show');
        });
        
        $('#btnSave').on('click', function(){
            if(!$('#pwdForm')[0].checkValidity() ){
                    $('<input type="submit">').hide().appendTo('#pwdForm').click().remove();
            }
            else{
                var current = $('#cPwd').val();
                var nPwd = $('#nPwd').val();
                var rPwd = $('#rPwd').val();
                
                if(nPwd !== rPwd){
                    alert("New password and retype password do not match!");
                    $('#nPwd').val('');
                    $('#rPwd').val('');
                }
                else{
                    var data ={
                        cPwd: current,
                        nPwd: nPwd
                    };
                    
                    $.ajax({
                        type: 'POST',
                        data: data,
                        timeout: 60000,
                        url: "control/changePwd.php",
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if(data.valid){
                                alert(data.msg);
                                window.location = "logout.php";
                            }
                            else{
                                alert(data.msg);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("Oops! "+errorThrown);
                        }
                    });
                }
            }
        });
    </script>
    
</html>

