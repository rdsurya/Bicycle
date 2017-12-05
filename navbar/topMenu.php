<div class="top-nav">										 
    <label class="mobile_menu" for="mobile_menu">
        <span>Menu</span>
    </label>
    <input id="mobile_menu" type="checkbox">
    <ul class="nav">
        <li class="dropdown1"><a href="">MANAGE PEOPLE</a>
            <ul class="dropdown2">
                <li><a href="../staff/main.php">STAFF</a></li>
                <li><a href="../customer/main.php">CUSTOMER</a></li>
            </ul>
        </li>
        <li class="dropdown1"><a href="">ASSETS</a>
            <ul class="dropdown2">
                <li><a href="../bicycle/main.php">BICYCLE</a></li>
            </ul>
        </li>      
        <li class="dropdown1"><a href="">BOOKING</a>
            <ul class="dropdown2">
                <li><a href="../booking/main.php">MANAGE BOOKING</a></li>
                <li><a href="Registration.html">REPORT</a></li>
            </ul>
        </li>               
        <li class="dropdown1">
            <a href="">PROFILE</a>
            <ul class="dropdown2">
                <li><a id="btnPwdModal" style="cursor: pointer;"><i class="fa fa-key"></i> Change Password</a></li>
                <li><a href="../entrance/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </li>        
    </ul>
</div>

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
                        <button id="btnSavePwd" type="button" class="btn btn-success"><i class="fa fa-floppy-o"></i> Save</button>
                    </span>
                    &nbsp;
                    <span>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pwd_clear()"><i class="fa fa-times"></i> Close</button>
                    </span>

                </div>

                <!-- content goes here -->
            </div>

        </div>
    </div>
</div>
<!-- Add Modal End -->  

<script>
        function pwd_clear(){
            $('#pwdForm')[0].reset();
        }
        
        $('#btnPwdModal').on('click', function(){
            $('#chahngePWD_modal').modal('show');
        });
        
        $('#btnSavePwd').on('click', function(){
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