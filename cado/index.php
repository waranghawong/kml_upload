<?php
include "../classes/userContr.classes.php";
include '../classes/db.php';
include '../classes/cado.classes.php';
include '../classes/cado-cntrl.classes.php';
$cado = new cadoCntrller();

$userdata = new UserCntr();
$user = $userdata->get_userdata();


if(isset($user)){
      
  $name = ucfirst($user['first_name']).' ' .ucfirst($user['last_name']);
  $username = $user['username'];
  $role = $user['role'];
  if($role == '1'){ 


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
                  <div class="x_content ">

                    <ul class="nav nav-tabs bar_tabs" style="border-style: none;" id="myTab" role="tablist">
                      <li class="nav-item mr-1">
                        <a class="nav-link active" id="Osint-tab" data-toggle="tab" href="#OSINT" role="tab" aria-controls="OSINT" aria-selected="true" onclick="Osint()">OSINT</a>
                      </li>
                      <li class="nav-item mr-1">
                        <a class="nav-link" id="Wacom-tab" data-toggle="tab" href="#WACOM" role="tab" aria-controls="WACOM" aria-selected="false" onclick="Wacom()">WACOM</a>
                      </li>
                      <li class="nav-item ml-auto mt-0">
                      <div class="input-group">
                          
                            <button type="button" class="btn btn-sm btn-primary" id="add_button" onclick="addOsint()">Add <i class="fa fa-plus"></i></button>
          
                        </div>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="OSINT" role="tabpanel" aria-labelledby="TOL-tab"><br>
                                   
                        <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action" id="osint">
                                <thead>
                                 
                                    <th class="column-title">No. </th>
                                    <th class="column-title">Date </th>
                                    <th class="column-title">Acc/LLOs Involved </th>
                                    <th class="column-title">Personalities Mention </th>
                                    <th class="column-title">Issues Raised </th>
                                    <th class="column-title">Others Data </th>
                                    <th class="column-title">Action </th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php
                                  $a = 0;
                                    
                                    if($cado->osintRecord() == false){
                                        echo 'no data';
                                    }
                                    else{
                                        foreach($cado->osintRecord() as $row){
                                            echo '<tr id="osint_'.$row['id'].'">';
                                            echo ' <td>'.$a++.'</td>';
                                            echo ' <td>'.$row['date'].'</td>';
                                            echo ' <td>'.$row['acc'].'</td>';
                                            echo ' <td>'.$row['personalities'].'</td>';
                                            echo ' <td>'.$row['issues'].'</td>';
                                            echo ' <td>'.$row['others'].'</td>';
                                            echo ' <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editOsint('.$row['id'].')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="delOsint('.$row['id'].')" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete subject"><i class="fa fa-trash"></button></td>';
                                            echo '</tr>';
                                        }
                                        
                                    }
                                  ?>

                                  </tbody>
                            </table>
                        </div>
                        
                      </div>
                      <div class="tab-pane fade" id="WACOM" role="tabpanel" aria-labelledby="profile-tab"><br>
                          <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" width="100%" id="wacom">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">No.</th>
                                  <th class="column-title">Full Name</th>
                                  <th class="column-title">Aliases </th>
                                  <th class="column-title">Picture </th>
                                  <th class="column-title">Birth Date </th>
                                  <th class="column-title">Address </th>
                                  <th class="column-title">Position </th>
                                  <th class="column-title">Affiliation </th>
                                  <th class="column-title">Other Data</th>
                                  <th class="column-title">Action</th>
                                </tr>
                              </thead>

                              <tbody>
                              <?php
                                  $a = 0;
                                    
                                    if($cado->wacomRecord() == false){
                                        echo 'no data';
                                    }
                                    else{
                                        foreach($cado->wacomRecord() as $row){
                                            echo '<tr id="wacom_'.$row['id'].'">';
                                            echo ' <td>'.$a++.'</td>';
                                            echo ' <td>'.$row['full_name'].'</td>';
                                            echo ' <td>'.$row['alias'].'</td>';
                                            echo ' <td>'.$row['dir'].'</td>';
                                            echo ' <td>'.$row['bday'].'</td>';
                                            echo ' <td>'.$row['address'].'</td>';
                                            echo ' <td>'.$row['position'].'</td>';
                                            echo ' <td>'.$row['affil'].'</td>';
                                            echo ' <td>'.$row['others'].'</td>';
                                            echo ' <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editWacom('.$row['id'].')" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="delWacom('.$row['id'].')" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete subject"><i class="fa fa-trash"></button></td>';
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
          </div>
        </div>

        <!-- /page content -->


        <!-- modal for adding OSINTs -->
        <div class="modal fade add_osint" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add OSINT</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/cado.inc.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="acc">Acc/LLOs Involved</label>
                            <input type="text" class="form-control" name="acc" required>
                        </div>
                        <div class="form-group">
                            <label for="personalities">Personalities Mention</label>
                            <input type="text" class="form-control" name="personalities" required>
                        </div>
                        <p id="conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="issues">Issues Raised</label>
                            <input type="text" class="form-control" name="issues" required>
                        </div>
                        <div class="form-group">
                            <label for="others_data">Others Data</label>
                            <input type="text" class="form-control" name="others_data" required>
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_osint" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end rmd modal -->

         <!-- modal for editing OSINTs -->
         <div class="modal fade edit_osint" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit OSINT</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/cado.inc.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="osint_id" id="osint_id">
                      <input type="hidden" class="form-control" name="user_role" value="cado" id="osint_id">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="osint-date">
                        </div>
                        <div class="form-group">
                            <label for="acc">Acc/LLOs Involved</label>
                            <input type="text" class="form-control" name="acc" id="osint-acc">
                        </div>
                        <div class="form-group">
                            <label for="personalities">Personalities Mention</label>
                            <input type="text" class="form-control" name="personalities" id="osint-personalities">
                        </div>
                        <p id="conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="issues">Issues Raised</label>
                            <input type="text" class="form-control" name="issues" id="osint-issues">
                        </div>
                        <div class="form-group">
                            <label for="others_data">Others Data</label>
                            <input type="text" class="form-control" name="others_data" id="osint-others">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="edit_submit_osint" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end osint edit modal -->
 

         <!-- modal for adding WACOM -->
         <div class="modal fade add_wacom" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add WACOM</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/cado.inc.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alias">Aliases</label>
                            <input type="text" class="form-control" name="alias" required>
                        </div>
                        <div class="form-group">
                            <label for="bday">Birth Date</label>
                            <input type="date" class="form-control" name="bday" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" required>
                        </div>
                        <div class="form-group">
                            <label for="affil">Affiliation</label>
                            <input type="text" class="form-control" name="affil" required>
                        </div>
                        <div class="form-group">
                            <label for="others">Other Data</label>
                            <input type="text" class="form-control" name="others" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="picture">Picture</label>
                            <input type="file" class="form-control" name="picture" required>
                        </div>
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_wacom" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end wacom modal -->

         <!-- modal for editing WACOM -->
         <div class="modal fade edit_wacom" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit WACOM</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/cado.inc.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="wacom_id" id="wacom_id">
                      <input type="hidden" class="form-control" name="user_role" value="cado" id="osint_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="wacom-first_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="wacom-last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alias">Aliases</label>
                            <input type="text" class="form-control" name="alias" id="wacom-alias">
                        </div>
                        <div class="form-group">
                            <label for="bday">Birth Date</label>
                            <input type="date" class="form-control" name="bday" id="wacom-bday">
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="wacom-address">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" id="wacom-position">
                        </div>
                        <div class="form-group">
                            <label for="affil">Affiliation</label>
                            <input type="text" class="form-control" name="affil" id="wacom-affil">
                        </div>
                        <div class="form-group">
                            <label for="others">Other Data</label>
                            <input type="text" class="form-control" name="others" id="wacom-others">
                        </div>
                    
                        <div class="form-group">
                            <label for="picture">Picture</label>
                            <input type="file" class="form-control" name="picture" id="wacom-picture">
                        </div>
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="edit_submit_wacom" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end wacom edit modal -->

       
        <!-- footer content -->
        <footer>
          <div class="pull-right">
          94th MICO(TECH)
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    <script src="../src/js/ph-address-selector.js"></script>
    <script>
       $("document").ready(function () {

        $('#osint').DataTable();
        $('#wacom').dataTable({
          "searching": true
        });
       })
      

      function Osint(){
        document.getElementById('add_button').setAttribute('onclick','addOsint()')
      }
      function Wacom(){
       document.getElementById('add_button').setAttribute('onclick','addWacom()')
      }
      function addOsint(){
        $(".add_osint").modal("show");
      }
      function addWacom(){
    
        $(".add_wacom").modal("show");
      }

      function mia(){
       document.getElementById('add_button').setAttribute('onclick','addMia()')
      }
      function addMia(){
    
        $(".add_mia_modal").modal("show");
      }


      function editOsint(id){
        $.ajax({
            method: "get",
            dataType: "json",
            url: "../includes/cado.inc.php?osint_id=" + id,
            success: function (response){
                    $('#osint_id').val(id)
                    $('#osint-date').val(response.date)
                    $('#osint-acc').val(response.acc)
                    $('#osint-personalities').val(response.personalities)
                    $('#osint-issues').val(response.issues)
                    $('#osint-others').val(response.others)
         
            }
        })
    
        $('.edit_osint').modal(); 
      }
      function editWacom(id){
        $.ajax({
            method: "get",
            dataType: "json",
            url: "../includes/cado.inc.php?wacom_id=" + id,
            success: function (response){
               const full_name = response.full_name
               let name = full_name.split(' ');

                $('#wacom_id').val(id)
                $('#wacom-first_name').val(name[0])
                $('#wacom-last_name').val(name[1])
                $('#wacom-alias').val(response.alias)
                $('#wacom-bday').val(response.bday)
                $('#wacom-address').val(response.address)
                $('#wacom-affil').val(response.affil)
                $('#wacom-others').val(response.others)
                $('#wacom-position').val(response.position)
            }
        })
  
        $('.edit_wacom').modal(); 
    }
    function delOsint(id){
      var confirmation = confirm("are you sure you want to remove the item?");

      if(confirmation){
          $.ajax({
              method: "get",
              url: "../includes/cado.inc.php?delete_liberty=" + id,
              success: function (response){
              $("#liberty_"+id).remove();
            }
          })
      } 
    }
    function delWacom(id){
      var confirmation = confirm("are you sure you want to remove the item?");

      if(confirmation){
          $.ajax({
              method: "get",
              url: "../includes/cado.inc.php?delete_liberty=" + id,
              success: function (response){
              $("#liberty_"+id).remove();
            }
          })
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