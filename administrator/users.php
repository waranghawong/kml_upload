<?php
include "../classes/userContr.classes.php";
include '../classes/db.php';
include '../classes/locations.classes.php';
include '../classes/locationscntrl.classes.php';
include_once '../classes/users.classes.php';
include_once '../classes/users-contrl.classes.php';
$saved_locations = new locationsCntrl();
$users = new usersController();

$list_of_users = $users->getListofUsers();
$userdata = new UserCntr();
$user = $userdata->get_userdata();


if(isset($user)){
      
  $name = ucfirst($user['first_name']).' ' .ucfirst($user['last_name']);
  $username = $user['username'];
  $role = $user['role'];
  if($role == 0){ 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/header.php"; ?>
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <style>
      ul.bar_tabs>li {
        border: none;

        
      }

      #add {
  display: inline-block;
  padding-left: 30px;
  float: left;
}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i>94TH MICO<span></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= ucfirst($username); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include "../includes/sidebar.inc.php"; ?>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="../images/user.png" alt=""><?= ucfirst($name); ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="../includes/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

              <div class="clearfix"></div>

              <div class="">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_content">
                    
                  <div class="table-responsive">
                                <table class="table table-hover" id="example" width="100%" cellspacing="0">
                                <div id="button_add">
                                    <button class="btn btn-sm btn-round btn-secondary" data-toggle="modal" data-target=".addUser"><i class="fa fa-plus">Add User</i></button>
                                </div>
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Code / Alias</th>
                                            <th>Unit</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $a = 0;
                                        
                                        if($list_of_users == false){
                                            echo 'no data';
                                        }
                                        else{
                                            foreach($list_of_users as $row){
                                                echo '<tr>';
                                                echo ' <td>'.$a++.'</td>';
                                                echo ' <td>'.$row['name'].'</td>';
                                                echo ' <td>'.$row['code'].'</td>';
                                                echo ' <td>'.($row['role'] == 1 ? "CADO" : ($row['role'] == "2" ? "SIGINT" : "GEOINT" )).'</td>';
                                                echo ' <td>'.$row['age'].'</td>';
                                                echo ' <td>'.$row['sex'].'</td>';
                                                echo '</tr>';
                                            }
                                            
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
        <!-- /page content -->

        

     

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}" action="../includes/users.inc.php">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Password</label>
                                <input type="password" class="form-control" name="password" id="user_password" required>
                                <span id="togglePassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="user_confirm_password" required>
                                <span id="toggleConfirmPassword" class="fa fa-fw fa-eye-slash field-icon toggle-confirm-password"></span>
                            </div>
                            <p id="conpasscheck" style="color: red;"></p>
                            <div class="form-group col-md-12">
                                <label for="Name">Code / Alias</label>
                                <input type="text" class="form-control" name="code" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Unit</label>
                                <select class="form-control" name="unit" required>
                                    <option value="1">CADO</option>
                                    <option value="2">SIGINT</option>
                                    <option value="3">GEOINT</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Age</label>
                                <input type="number" class="form-control" name="age" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Sex</label>
                                <select class="form-control" name="sex" required>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>


                        </div>

                        <div class="d-flex justify-content-center">
                                <button type="submit" name="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
               
            </div>
        </div>
    </div>

       <!-- Add User Modal -->
       <div class="modal fade editUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}" action="../includes/users.inc.php">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Password</label>
                                <input type="password" class="form-control" name="password" id="" required>
                                <span id="toggleEditPassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="" required>
                                <span id="toggleConfirmEditPassword" class="fa fa-fw fa-eye-slash field-icon toggle-confirm-password"></span>
                            </div>
                            <p id="conpasscheck1" style="color: red;"></p>
                            <div class="form-group col-md-12">
                                <label for="Name">Code / Alias</label>
                                <input type="text" class="form-control" name="code" id="code" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Unit</label>
                                <select class="form-control" name="unit" id="unit" required>
                                    <option value="1">CADO</option>
                                    <option value="2">SIGINT</option>
                                    <option value="3">GOEINT</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Age</label>
                                <input type="text" class="form-control" name="age" id="age" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Name">Sex</label>
                                <select class="form-control" name="sex" id="sex" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>


                        </div>

                        <div class="d-flex justify-content-center">
                                <button type="submit" name="btn_edit_submit" id="btn_edit_submit" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
        $(document).ready(function(){

            $("#conpasscheck").hide();
            $("#conpasscheck1").hide();
            $('#btn_edit_submit').hide();
            $("#btn_submit").hide(); 

            let confirmPasswordError = true;
            $("#user_confirm_password").keyup(function () {
                validateConfirmPassword();
            });
            $('#user_password').keyup(function(){
                validatePassword();
            })
            $("#user_confirm_password").keyup(function () {
                validateEditConfirmPassword();
            });
            $('#edit_user_password').keyup(function(){
                validateEditUserPassword();
            })


            var table = $('#example').DataTable({
            dom : 'l<".add pull-right ml-2">frtip'
            }) 


            $select = $("#button_add").appendTo('.add')
       
        })
        // new DataTable('#example', {
        //     dom: '<"toolbar">frtip'
        // });
        // document.querySelector('div.toolbar').innerHTML = '<b>Custom tool bar! Text/images etc.</b>';

        const togglePassword = document.querySelector("#togglePassword");
        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
        const password = document.querySelector("#user_password");
        const confirm_password = document.querySelector("#user_confirm_password");

        togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("fa-eye");
    
        });
        toggleConfirmPassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = confirm_password.getAttribute("type") === "password" ? "text" : "password";
        confirm_password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("fa-eye");

    
        });

        



        function validateConfirmPassword() {
        let confirmPasswordValue = $("#user_confirm_password").val();
        let passwordValue = $("#user_password").val();
        if (passwordValue != confirmPasswordValue) {
            $("#conpasscheck").show();
            $("#conpasscheck").html("Password didn't Match");
            $("#conpasscheck").css("color", "red");
            $('#btn_submit').attr("disabled", true);
            confirmPasswordError = false;
          
            
            return false;
        } else {
            $("#conpasscheck").hide();
            $("#btn_submit").show();
            $('#btn_submit').attr("disabled", false);
        }
        }

        function validatePassword() {
            let confirmPasswordValue = $("#user_confirm_password").val();
            let passwordValue = $("#user_password").val();
            if (passwordValue != confirmPasswordValue) {
                $("#conpasscheck").show();
                $("#conpasscheck").html("Password didn't Match");
                $("#conpasscheck").css("color", "red");
                $('#btn_submit').attr("disabled", true);
                confirmPasswordError = false;
            
                
                return false;
            } else {
                $("#conpasscheck").hide();
                $("#btn_submit").show();
                $('#btn_submit').attr("disabled", false);
            }
        }
    </script>
  </body>
</html>

<?php
 }
 else{
    header('location: ../loginssss.php');
 }
}
else{
  header('location: ../login.html');
}

?>