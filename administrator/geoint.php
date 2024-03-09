<?php
include "../classes/userContr.classes.php";
include '../classes/db.php';
include '../classes/geoint.classes.php';
include '../classes/geoint-cntrl.classes.php';

$tol_area = new geoIntCntrller();

$userdata = new UserCntr();
$user = $userdata->get_userdata();


if(isset($user)){
      
  $name = ucfirst($user['first_name']).' ' .ucfirst($user['last_name']);
  $username = $user['username'];
  $role = $user['role'];
  if($role == '0'){ 



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
                  <div class="x_content ">

                    <ul class="nav nav-tabs bar_tabs" style="border-style: none;" id="myTab" role="tablist">
                      <li class="nav-item mr-1">
                        <a class="nav-link <?php if(isset($_GET['success'])){ if($_GET['success'] == 'tol_area') { echo 'active'; }else{ ''; } }else{ echo 'active'; } ?>" id="TOL-tab" data-toggle="tab" href="#TOL" role="tab" aria-controls="TOL" aria-selected="true" onclick="tol()">TOL area</a>
                      </li>
                      <li class="nav-item mr-1">
                        <a class="nav-link <?php if(isset($_GET['success'])){ if($_GET['success'] == 'isr') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="ISR-tab" data-toggle="tab" href="#ISR" role="tab" aria-controls="ISR" aria-selected="false" onclick="isr()">ISR report</a>
                      </li>
                      <li class="nav-item mr-1">
                        <a class="nav-link <?php if(isset($_GET['success'])){ if($_GET['success'] == 'prof') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="Prof-tab" data-toggle="tab" href="#Prof" role="tab" aria-controls="Prof" aria-selected="false" onclick="Prof()">Proficiency report</a>
                      </li>
                      <li class="nav-item mr-1">
                        <a class="nav-link <?php if(isset($_GET['success'])){ if($_GET['success'] == 'uav') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="uav-tab" data-toggle="tab" href="#uav" role="tab" aria-controls="uav" aria-selected="false" onclick="uav()">UAV utilization</a>
                      </li>
                      <li class="nav-item ml-auto mt-0">
                      <div class="input-group">
                     
                          <span class="input-group-btn">
                          
                            <button type="button" class="btn btn-sm btn-primary" id="add_button" onclick="tol()">Add <i class="fa fa-plus"></i></button>
                          </span>
                        </div>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade  <?php if(isset($_GET['success'])){ if($_GET['success'] == 'tol_area') { echo 'active'; } else{ ' '; } } else{ echo 'active'; } ?>" id="TOL" role="tabpanel" aria-labelledby="TOL-tab"><br>
                                   
                        <div class="table-responsive">
                          <form method="POST" action="../sample.php">
                              <table class="table table-striped jambo_table bulk_action" id="example" width="100%">
                                <thead>
                                  <tr class="headings">
                                  <div class="category-filter col-sm-12">
                                      <select id="categoryFilter" class="form-control">
                                        <option value="">All</option>
                                        <option value="SRC1">THOR</option>
                                        <option value="SRC2">GRIFFIN</option>
                                        <option value="SRC3">LEX 1</option>
                                        <option value="SRC4">SK3</option>
                                      </select>
                                    </div>
                                 
                                  <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                  </th>
                                    <th class="column-title">Address</th>
                                    <th class="column-title">Type of UAV</th>
                                    <th class="column-title">Position </th>
                                    <th class="column-title">Unit </th>
                                    <th class="column-title">Date/time </th>
                                    <th class="column-title">Remarks </th>
                                    <th class="column-title">Kml/kmz files </th>
                                    <th class="column-title">Action</th>
                                    <th class="bulk-actions" colspan="16">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>

                                <!-- tol area php -->
                                <?php
                                 if($tol_area->tolArea() == false){
                                  echo '';
                                 }
                                 else{
                                  foreach($tol_area->tolArea() as $tol){
                                    $a = 0;
                                ?>
                                  
                                  <tr id="tol_<?= $tol['id'] ?>">
                                      <td class="a-center "><input type="checkbox" class="flat" value="'.$row['dir'].'" name="check[]"></td>
                                      <td><?= $tol['address'] ?></td>
                                      <td><?= $tol['uav'] ?></td>
                                      <td><?= $tol['position'] ?></td>
                                      <td><?= $tol['unit'] ?></td>
                                      <td><?= $tol['date'].'/'.$tol['time'] ?></td>
                                      <td><?= $tol['remarks'] ?></td>
                                      <td><?= $tol['file_name'] ?></td>
                                      <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editTolRecord(<?= $tol['id'];?>)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="deleteTolRecord(<?= $tol['id'];?>)" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete record"><i class="fa fa-trash"></button></td>
                                <?php
                                }
                                 }
                                
                                
                                ?>



                                  </tbody>
                            </table>
                            <button type="submit" name="submit_files" class="btn btn-sm btn-round btn-secondary"> Go </button>
                          </form>
                        </div>
                        
                      </div>
                      <div class="tab-pane  <?php if(isset($_GET['success'])){ if($_GET['success'] == 'isr') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="ISR" role="tabpanel" aria-labelledby="profile-tab"><br>
                          <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" width="100%" id="tbl_rmd">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">Subject:</th>
                                  <th class="column-title">To:</th>
                                  <th class="column-title">Reference:</th>
                                  <th class="column-title">Background:</th>
                                  <th class="column-title">Flight Details:</th>
                                  <th class="column-title">Result:</th>
                                  <th class="column-title">Analysis:</th>
                                  <th class="column-title">Assessment:</th>
                                  <th class="column-title">Lesson learned:</th>
                                  <th class="column-title">Best Practices:</th>
                                  <th class="column-title">Issues and Concerns:</th>
                                  <th class="column-title">Recommendation:</th>
                                  <th class="column-title">Action:</th>
                                 
                                </tr>
                              </thead>

                              <tbody>
                                  <?php
                                    if($tol_area->isrData() == false){
                                      echo '';
                                    }
                                    else{
                                      foreach($tol_area->isrData() as $row){
                                        $a = 0;
                                    ?>
                                      
                                      <tr id="isr_<?= $row['id'] ?>">
                                          <td><?= $row['subject'] ?></td>
                                          <td><?= $row['isr_to'] ?></td>
                                          <td><?= $row['reference'] ?></td>
                                          <td><?= $row['background'] ?></td>
                                          <td><?= $row['flight_details'] ?></td>
                                          <td><?= $row['result'] ?></td>
                                          <td><?= $row['analysis'] ?></td>
                                          <td><?= $row['assessment'] ?></td>
                                          <td><?= $row['lesson_learned'] ?></td>
                                          <td><?= $row['best_practices'] ?></td>
                                          <td><?= $row['issues_concern'] ?></td>
                                          <td><?= $row['recommendation'] ?></td>
                            
                                          <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editIsr(<?= $row['id'];?>)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="delIsr(<?= $row['id'];?>)" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete record"><i class="fa fa-trash"></button></td>
                                    <?php
                                    }
                                    }
                                    
                                    
                                    ?>
                              </tbody>
                            </table>
                        </div>
                      </div>
                      <div class="tab-pane <?php if(isset($_GET['success'])){ if($_GET['success'] == 'prof') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="Prof" role="tabpanel" aria-labelledby="prof-tab"><br>
                          <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action" width="100%" id="tbl_prof">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">Subject:</th>
                                  <th class="column-title">To:</th>
                                  <th class="column-title">Reference:</th>
                                  <th class="column-title">Background:</th>
                                  <th class="column-title">Flight Details:</th>
                                  <th class="column-title">Result:</th>
                                  <th class="column-title">Analysis:</th>
                                  <th class="column-title">Assessment:</th>
                                  <th class="column-title">Lesson learned:</th>
                                  <th class="column-title">Best Practices:</th>
                                  <th class="column-title">Issues and Concerns:</th>
                                  <th class="column-title">Recommendation:</th>
                                  <th class="column-title">Action:</th>
                                 
                                </tr>
                              </thead>

                              <tbody>
                                  <?php
                                    if($tol_area->profData() == false){
                                      echo '';
                                    }
                                    else{
                                      foreach($tol_area->profData() as $row){
                                        $a = 0;
                                    ?>
                                      
                                      <tr id="prof_<?= $tol['id'] ?>">
                                          <td><?= $row['subject'] ?></td>
                                          <td><?= $row['isr_to'] ?></td>
                                          <td><?= $row['reference'] ?></td>
                                          <td><?= $row['background'] ?></td>
                                          <td><?= $row['flight_details'] ?></td>
                                          <td><?= $row['result'] ?></td>
                                          <td><?= $row['analysis'] ?></td>
                                          <td><?= $row['assessment'] ?></td>
                                          <td><?= $row['lesson_learned'] ?></td>
                                          <td><?= $row['best_practices'] ?></td>
                                          <td><?= $row['issues_concern'] ?></td>
                                          <td><?= $row['recommendation'] ?></td>
                            
                                          <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editProf(<?= $row['id'];?>)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="delProf(<?= $row['id'];?>)" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete record"><i class="fa fa-trash"></button></td>
                                    <?php
                                    }
                                    }
                                    
                                    
                                    ?>
                              </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="tab-pane <?php if(isset($_GET['success'])){ if($_GET['success'] == 'uav') { echo 'active'; }else{ ''; } }else{ echo ''; } ?>" id="uav" role="tabpanel" aria-labelledby="uav-tab"><br>
                          <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" id="tbl_uav" width="100%">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">#</th>
                                  <th class="column-title">Quantity </th>
                                  <th class="column-title">Type of drone </th>
                                  <th class="column-title">System Number </th>
                                  <th class="column-title">Drone Number </th>
                                  <th class="column-title">Battery Serial </th>
                                  <th class="column-title">Unit </th>
                                  <th class="column-title">Remarks </th>
                                  <th class="column-title">Action </th>
                                </tr>
                              </thead>

                              <tbody>
                                  <?php
                                    if($tol_area->getUav() == false){
                                      echo '';
                                    }
                                    else{
                                      foreach($tol_area->getUav() as $row){
                                        $a = 1;
                                    ?>
                                      
                                      <tr id="tol_<?= $tol['id'] ?>">
                                          <td><?= $a++ ?></td>
                                          <td><?= $row['quantity'] ?></td>
                                          <td><?= $row['type_of_drone'] ?></td>
                                          <td><?= $row['system_number'] ?></td>
                                          <td><?= $row['drone_number'] ?></td>
                                          <td><?= $row['battery_serial'] ?></td>
                                          <td><?= $row['unit'] ?></td>
                                          <td><?= $row['remarks'] ?></td>
                            
                                          <td><button type="button" data-toggle="tooltip" data-placement="top" title="edit" onclick="editUav(<?= $row['id'];?>)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button> <button type="button" onclick="delUav(<?= $row['id'];?>)" class="btn btn-sm btn-danger dlt_record" data-toggle="tooltip" data-placement="top" title="delete record"><i class="fa fa-trash"></button></td>
                                    <?php
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

        <!-- start tol_area modal -->

        <div class="modal fade tol_area" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add TOL Area</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                         <input type="hidden" class="form-control" name="role" value="admin">
                            <div class="form-group">
                                <label for="Name">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="time">
                            </div>
                            <div class="form-group">
                                <label for="uav">UAV</label>
                                <select name="uav" class="form-control">
                                  <option value="THOR">THOR</option>
                                  <option value="GRIFFIN">GRIFFIN</option>
                                  <option value="LEX 1">LEX 1</option>
                                  <option value="SK3">SK3</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="name">Name/Alias KMZ</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position">
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Region</label>
                            <select id="region1" class="form-control"></select>
                            <input type="hidden" name="region_text" id="region-text1">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Province</label>
                            <select id="province1" class="form-control"></select>
                            <input type="hidden" name="province_text" id="province-text1">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">City</label>
                            <select id="city1" class="form-control"></select>
                            <input type="hidden" name="city_text" id="city-text1">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Barangay</label>
                            <select id="barangay1" class="form-control"></select>
                            <input type="hidden" name="barangay_text" id="barangay-text1">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" class="form-control" name="remarks">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Upload KML/KMZ</label>
                            <input type="file" class="form-control" name="geoint">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_tol_area" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- end tol_area modal -->

        <!-- edit tol_area modal -->

        <div class="modal fade edit_tol_area" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit TOL Area Record</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                            <input type="hidden" name="tol_id" id="tol_id">
                            <input type="hidden" name="role" value="admin">
                            <div class="form-group">
                                <label for="edit_date">Date</label>
                                <input type="date" class="form-control" name="edit_date" id="edit_date" >
                            </div>
                            <div class="form-group">
                                <label for="edit_time">Time</label>
                                <input type="time" class="form-control" name="edit_time" id="edit_time">
                            </div>
                            <div class="form-group">
                                <label for="uav">UAV</label>
                                <select name="uav" class="form-control" id="edit_uav">
                                  <option value="THOR">THOR</option>
                                  <option value="GRIFFIN">GRIFFIN</option>
                                  <option value="LEX 1">LEX 1</option>
                                  <option value="SK3">SK3</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="edit_name">Name/Alias KMZ</label>
                            <input type="text" class="form-control" name="edit_name" id="edit_name">
                        </div>
                        <div class="form-group">
                            <label for="edit_position">Position</label>
                            <input type="text" class="form-control" name="edit_position" id="edit_position">
                        </div>
                        <div class="form-group">
                            <label for="edit_unit">Unit</label>
                            <input type="text" class="form-control" name="edit_unit" id="edit_unit">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Region</label>
                            <select id="tol_region" class="form-control"></select>
                            <input type="hidden" name="region_text" id="tol-region-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Province</label>
                            <select id="tol_province" class="form-control"></select>
                            <input type="hidden" name="province_text" id="tol-province-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">City</label>
                            <select id="tol_city" class="form-control"></select>
                            <input type="hidden" name="city_text" id="tol-city-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Barangay</label>
                            <select id="tol_barangay" class="form-control"></select>
                            <input type="hidden" name="barangay_text" id="tol-barangay-text">
                        </div>
                        <div class="form-group">
                            <label for="edit_remarks">Remarks</label>
                            <input type="text" class="form-control" name="edit_remarks" id="edit_remarks">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Upload KML/KMZ</label>
                            <input type="file" class="form-control" name="geoint">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_edit_tol_area" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- edit tol_area modal -->


        <!-- modal for adding isr -->
        <div class="modal fade add_isr" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add ISR Report</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                        <input type="hidden" name="role" value="admin">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="isr_to">To</label>
                            <input type="text" class="form-control" name="isr_to">
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input type="text" class="form-control" name="reference">
                        </div>
                        <div class="form-group">
                            <label for="background">Background</label>
                            <input type="text" class="form-control" name="background">
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" name="flight_details" required>
                        </div>
                        <div class="form-group">
                            <label for="result">Result</label>
                            <input type="text" class="form-control" name="result" required>
                        </div>
                        <div class="form-group">
                            <label for="analysis">Analysis</label>
                            <input type="text" class="form-control" name="analysis" required>
                        </div>
                        <div class="form-group">
                            <label for="assessment">Assessment</label>
                            <input type="text" class="form-control" name="assessment" required> 
                        </div>
                        <div class="form-group">
                            <label for="lesson_learned">Lesson Learned</label>
                            <input type="text" class="form-control" name="lesson_learned" required>
                        </div>
                        <div class="form-group">
                            <label for="best_practices">Best Practices</label>
                            <input type="text" class="form-control" name="best_practices" required>
                        </div>
                        <div class="form-group">
                            <label for="issues_concern">Issues and Concern</label>
                            <input type="text" class="form-control" name="issues_concern" required>
                        </div>
                        <div class="form-group">
                            <label for="recommendation">Recommendation</label>
                            <input type="text" class="form-control" name="recommendation">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_isr_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end isr modal -->

          <!-- modal for edit isr -->
          <div class="modal fade edit_isr" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit ISR Report</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="isr_id" id="isr_id">
                      <input type="hidden" name="role" value="admin">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="isr-subject">
                        </div>
                        <div class="form-group">
                            <label for="isr_to">To</label>
                            <input type="text" class="form-control" name="isr_to" id="isr-isr_to">
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input type="text" class="form-control" name="reference" id="isr-reference">
                        </div>
                        <div class="form-group">
                            <label for="background">Background</label>
                            <input type="text" class="form-control" name="background" id="isr-background">
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" name="flight_details" id="isr-flight_details">
                        </div>
                        <div class="form-group">
                            <label for="result">Result</label>
                            <input type="text" class="form-control" name="result" id="isr-result">
                        </div>
                        <div class="form-group">
                            <label for="analysis">Analysis</label>
                            <input type="text" class="form-control" name="analysis" id="isr-analysis">
                        </div>
                        <div class="form-group">
                            <label for="assessment">Assessment</label>
                            <input type="text" class="form-control" name="assessment" id="isr-assessment"> 
                        </div>
                        <div class="form-group">
                            <label for="lesson_learned">Lesson Learned</label>
                            <input type="text" class="form-control" name="lesson_learned" id="isr-lesson_learned">
                        </div>
                        <div class="form-group">
                            <label for="best_practices">Best Practices</label>
                            <input type="text" class="form-control" name="best_practices" id="isr-best_practices">
                        </div>
                        <div class="form-group">
                            <label for="issues_concern">Issues and Concern</label>
                            <input type="text" class="form-control" name="issues_concern" id="isr-issues_concern">
                        </div>
                        <div class="form-group">
                            <label for="recommendation">Recommendation</label>
                            <input type="text" class="form-control" name="recommendation" id="isr-recommendation">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_edit_isr_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end edit isr modal -->

          <!-- modal for adding profeciency -->
          <div class="modal fade addProf" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Proficiency Report</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                        <input type="hidden" value="admin" name="role">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="isr_to">To</label>
                            <input type="text" class="form-control" name="isr_to">
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input type="text" class="form-control" name="reference">
                        </div>
                        <div class="form-group">
                            <label for="background">Background</label>
                            <input type="text" class="form-control" name="background">
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" name="flight_details" required>
                        </div>
                        <div class="form-group">
                            <label for="result">Result</label>
                            <input type="text" class="form-control" name="result" required>
                        </div>
                        <div class="form-group">
                            <label for="analysis">Analysis</label>
                            <input type="text" class="form-control" name="analysis" required>
                        </div>
                        <div class="form-group">
                            <label for="assessment">Assessment</label>
                            <input type="text" class="form-control" name="assessment" required> 
                        </div>
                        <div class="form-group">
                            <label for="lesson_learned">Lesson Learned</label>
                            <input type="text" class="form-control" name="lesson_learned" required>
                        </div>
                        <div class="form-group">
                            <label for="best_practices">Best Practices</label>
                            <input type="text" class="form-control" name="best_practices" required>
                        </div>
                        <div class="form-group">
                            <label for="issues_concern">Issues and Concern</label>
                            <input type="text" class="form-control" name="issues_concern" required>
                        </div>
                        <div class="form-group">
                            <label for="recommendation">Recommendation</label>
                            <input type="text" class="form-control" name="recommendation">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_prof_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end profeciency modal -->

          <!-- modal for edit profeciency -->
          <div class="modal fade edit_prof" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Proficiency Report</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="isr_id" id="prof_id">
                      <input type="hidden" name="role" value="admin">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="prof-subject">
                        </div>
                        <div class="form-group">
                            <label for="isr_to">To</label>
                            <input type="text" class="form-control" name="isr_to" id="prof-isr_to">
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input type="text" class="form-control" name="reference" id="prof-reference">
                        </div>
                        <div class="form-group">
                            <label for="background">Background</label>
                            <input type="text" class="form-control" name="background" id="prof-background">
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" name="flight_details" id="prof-flight_details">
                        </div>
                        <div class="form-group">
                            <label for="result">Result</label>
                            <input type="text" class="form-control" name="result" id="prof-result">
                        </div>
                        <div class="form-group">
                            <label for="analysis">Analysis</label>
                            <input type="text" class="form-control" name="analysis" id="prof-analysis">
                        </div>
                        <div class="form-group">
                            <label for="assessment">Assessment</label>
                            <input type="text" class="form-control" name="assessment" id="prof-assessment"> 
                        </div>
                        <div class="form-group">
                            <label for="lesson_learned">Lesson Learned</label>
                            <input type="text" class="form-control" name="lesson_learned" id="prof-lesson_learned">
                        </div>
                        <div class="form-group">
                            <label for="best_practices">Best Practices</label>
                            <input type="text" class="form-control" name="best_practices" id="prof-best_practices">
                        </div>
                        <div class="form-group">
                            <label for="issues_concern">Issues and Concern</label>
                            <input type="text" class="form-control" name="issues_concern" id="prof-issues_concern">
                        </div>
                        <div class="form-group">
                            <label for="recommendation">Recommendation</label>
                            <input type="text" class="form-control" name="recommendation" id="prof-recommendation">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_edit_prof_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end edit profeciency modal -->

          <!-- modal for adding uav -->
          <div class="modal fade add_uav" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add UAV</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                        <input type="hidden" value="admin" name="role">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="isr_to">Type of drone</label>
                            <input type="text" class="form-control" name="type_of_drone" required>
                        </div>
                        <div class="form-group">
                            <label for="reference">System Number</label>
                            <input type="number" class="form-control" name="system_number" required>
                        </div>
                        <div class="form-group">
                            <label for="background">Drone Number</label>
                            <input type="number" class="form-control" name="drone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" name="flight_details" required>
                        </div>
                        <div class="form-group">
                            <label for="result">Battery Serial</label>
                            <input type="text" class="form-control" name="battery_serial" required>
                        </div>
                        <div class="form-group">
                            <label for="analysis">Unit</label>
                            <input type="text" class="form-control" name="unit" required>
                        </div>
                        <div class="form-group">
                            <label for="assessment">Remarks</label>
                            <input type="text" class="form-control" name="remark" required> 
                        </div>
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_uav" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end uav modal -->

          <!-- modal for edit uav modal-->
          <div class="modal fade edit_uav" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Proficiency Report</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="tol">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/geoint.inc.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="uav_id" id="uav_id">
                      <input type="hidden" name="role" value="admin">
                        <div class="form-tol">
                        </div>
                        <div class="form-group">
                            <label for="subject">Quantity</label>
                            <input type="number" class="form-control" id="uav-quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="isr_to">Type of drone</label>
                            <input type="text" class="form-control" id="uav-type_of_drone" name="type_of_drone" required>
                        </div>
                        <div class="form-group">
                            <label for="reference">System Number</label>
                            <input type="number" class="form-control" id="uav-system_number" name="system_number" required>
                        </div>
                        <div class="form-group">
                            <label for="background">Drone Number</label>
                            <input type="number" class="form-control" id="uav-drone_number" name="drone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="flight_details">Flight Details</label>
                            <input type="text" class="form-control" id="uav-flight_details" name="flight_details" required>
                        </div>
                        <div class="form-group">
                            <label for="result">Battery Serial</label>
                            <input type="text" class="form-control" id="uav-battery_serial" name="battery_serial" required>
                        </div>
                        <div class="form-group">
                            <label for="analysis">Unit</label>
                            <input type="text" class="form-control" id="uav-unit" name="unit" required>
                        </div>
                        <div class="form-group">
                            <label for="assessment">Remarks</label>
                            <input type="text" class="form-control" id="uav-remark" name="remark" required> 
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_edit_uav_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end edit uav modal -->
 

        

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

        $('#tbl_rmd').DataTable();
        $('#tbl_prof').DataTable();
        $('#tbl_uav').DataTable();
        $('#example').dataTable({
          "searching": true
        });

        var table = $('#example').DataTable();

        $("#example_length").append($("#categoryFilter"));
        $("#asd").append($("#categoryFilter"));

        var categoryIndex = 0;
        $("#example th").each(function (i) {
          if ($($(this)).html() == "Company") {
            categoryIndex = i; return false;
          }
        });

        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var selectedItem = $('#categoryFilter').val()
          var category = data[categoryIndex];
          if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
          }
          return false;
        }
      );

      $("#categoryFilter").change(function (e) {
        table.draw();
      });

      table.draw();


       })
      

      function tol(){
        document.getElementById('add_button').setAttribute('onclick','addTol()')
      }
      function isr(){
       document.getElementById('add_button').setAttribute('onclick','addISR()')
      }
      function Prof(){
       document.getElementById('add_button').setAttribute('onclick','addProf()')
      }
      function uav(){
       document.getElementById('add_button').setAttribute('onclick','addUav()')
      }
      function addTol(){
        $(".tol_area").modal("show");
      }
      function addISR(){
    
        $(".add_isr").modal("show");
      }
      function addProf(){
        $(".addProf").modal("show");
      }
      function addUav(){
        $(".add_uav").modal("show");
      }

      function editProf(id){
        $.ajax({
            method: "get",
            dataType: "json",
            url: "../includes/geoint.inc.php?prof_id=" + id,
            success: function (response){
      
              $('#prof_id').val(id)
              $('#prof-subject').val(response.subject)
              $('#prof-isr_to').val(response.isr_to)
              $('#prof-reference').val(response.reference)
              $('#prof-background').val(response.background)
              $('#prof-flight_details').val(response.flight_details)
              $('#prof-result').val(response.result)
              $('#prof-analysis').val(response.analysis)
              $('#prof-assessment').val(response.assessment)
              $('#prof-lesson_learned').val(response.lesson_learned)
              $('#prof-best_practices').val(response.best_practices)
              $('#prof-issues_concern').val(response.issues_concern)
              $('#prof-recommendation').val(response.recommendation)  
             
            }
        })
        // $('#prof_uid').val(prof_id);
        $('.edit_prof').modal(); 
      }

      function editIsr(id){
        $.ajax({
            method: "get",
            dataType: "json",
            url: "../includes/geoint.inc.php?isr_id=" + id,
            success: function (response){
      
              $('#isr_id').val(id)
              $('#isr-subject').val(response.subject)
              $('#isr-isr_to').val(response.isr_to)
              $('#isr-reference').val(response.reference)
              $('#isr-background').val(response.background)
              $('#isr-flight_details').val(response.flight_details)
              $('#isr-result').val(response.result)
              $('#isr-analysis').val(response.analysis)
              $('#isr-assessment').val(response.assessment)
              $('#isr-lesson_learned').val(response.lesson_learned)
              $('#isr-best_practices').val(response.best_practices)
              $('#isr-issues_concern').val(response.issues_concern)
              $('#isr-recommendation').val(response.recommendation)
                   



                    
             
            }
        })
        // $('#prof_uid').val(prof_id);
        $('.edit_isr').modal(); 
      }
      function delIsr(id){

        var confirmation = confirm("are you sure you want to remove the item?");

        if(confirmation){
            $.ajax({
                method: "get",
                url: "../includes/geoint.inc.php?delete_isr=" + id,
                success: function (response){
                $("#isr_"+id).remove();
                }
            })
        }
      }

      function delProf(id){

        var confirmation = confirm("are you sure you want to remove the item?");

        if(confirmation){
            $.ajax({
                method: "get",
                url: "../includes/geoint.inc.php?delete_prof=" + id,
                success: function (response){
                $("#prof_"+id).remove();
                }
            })
        }
      }

      function deleteTolRecord(id){
        var confirmation = confirm("are you sure you want to remove this record?");

        if(confirmation){
            $.ajax({
                method: "get",
                url: "../includes/geoint.inc.php?tol_record=" + id,
                success: function (response){
                $("#tol_"+id).remove();
                }
            })
        }
      }

      function editTolRecord(id){

          $.ajax({
              method: "get",
              dataType: "json",
              url: "../includes/geoint.inc.php?userid=" + id,
              success: function (response){
              $.each(response, function(index, data) {
                       $("#tol_id").val(id); 
                       $("#edit_uav").val(data.uav); 
                      $('#edit_date').val(data.date)
                      $('#edit_time').val(data.time)
                      $('#edit_name').val(data.file_name)
                      $('#edit_position').val(data.position)
                      $('#edit_unit').val(data.unit)
                      $('#edit_remarks').val(data.remarks)
                      
                  });
              }
          })
          // $('#prof_uid').val(prof_id);
          $('.edit_tol_area').modal(); 
      }

      function editUav(id){
        
        $.ajax({
              method: "get",
              dataType: "json",
              url: "../includes/geoint.inc.php?uav_id=" + id,
              success: function (response){
              $.each(response, function(index, data) {
                      console.log(data)
                      $("#uav_id").val(id); 
                      $("#uav-quantity").val(data.quantity); 
                      $('#uav-type_of_drone').val(data.type_of_drone)
                      $('#uav-system_number').val(data.system_number)
                      $('#uav-drone_number').val(data.drone_number)
                      $('#uav-flight_details').val(data.flight_details)
                      $('#uav-battery_serial').val(data.battery_serial)
                      $('#uav-unit').val(data.unit)
                      $('#uav-remark').val(data.remarks)
                      
                  });
              }
          })
          // $('#prof_uid').val(prof_id);
          $('.edit_uav').modal(); 
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
x
?>