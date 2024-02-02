<?php
include "../classes/userContr.classes.php";
include '../classes/db.php';
include '../classes/locations.classes.php';
include '../classes/locationscntrl.classes.php';
$saved_locations = new locationsCntrl();

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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="selector()">SELECTOR</a>
                      </li>
                      <li class="nav-item mr-1">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="rmd()">RMD</a>
                      </li>
                      <li class="nav-item ml-auto">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                            <button type="button" class="btn btn-sm btn-primary" id="add_button" onclick="addSelector()">Add <i class="fa fa-plus"></i></button>
                          </span>
                        </div>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
                                   
                        <div class="table-responsive">
                          <form method="POST" action="../sample.php">
                              <table class="table table-striped jambo_table bulk_action" id="example">
                                <thead>
                                  <tr class="headings">
                                  <div class="category-filter col-sm-12">
                                      <select id="categoryFilter" class="form-control">
                                        <option value="">All</option>
                                        <option value="SRC1">SRC1</option>
                                        <option value="SRC2">SRC2</option>
                                        <option value="SRC3">SRC3</option>
                                        <option value="SRC4">SRC4</option>
                                        <option value="SRC5">SRC5</option>
                                      </select>
                                    </div>
                                 
                                  <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                  </th>
                                    <th class="column-title">Number </th>
                                    <th class="column-title">Company</th>
                                    <th class="column-title">Name/alias </th>
                                    <th class="column-title">Position </th>
                                    <th class="column-title">Unit </th>
                                    <th class="column-title">Selector / cp number </th>
                                    <th class="column-title">IMSI</th>
                                    <th class="column-title">IMEI </th>
                                    <th class="column-title">Date/time </th>
                                    <th class="column-title">LAC/CID </th>
                                    <th class="column-title">Address </th>
                                    <th class="column-title">Remarks </th>
                                    <th class="column-title">Kml/kmz files </th>
                                    <th class="bulk-actions" colspan="16">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php
                                $a = 0;
                                  
                                  if($saved_locations->getKMS() == false){
                                      echo 'no data';
                                  }
                                  else{
                                      foreach($saved_locations->getKMS() as $row){
                                          echo '<tr>';
                                          echo '<td class="a-center "><input type="checkbox" class="flat" value="'.$row['dir'].'" name="check[]"></td>';
                                          echo ' <td>'.$a++.'</td>';
                                          echo ' <td>'.$row['company'].'</td>';
                                          echo ' <td>'.$row['name'].'</td>';
                                          echo ' <td>'.$row['position'].'</td>';
                                          echo ' <td>'.$row['unit'].'</td>';
                                          echo ' <td>'.$row['selector_name'].'</td>';
                                          echo ' <td>'.$row['imsi'].'</td>';
                                          echo ' <td>'.$row['imei'].'</td>';
                                          echo ' <td>'.$row['date'].' '.$row['time'].'</td>';
                                          echo ' <td>'.$row['lac_cid'].'</td>';
                                          echo ' <td>'.$row['address'].'</td>';
                                          echo ' <td>'.$row['remarks'].'</td>';
                                          echo '  <td><a href="../sample.php?dir='.substr($row['dir'], 3).'" target="_blank"><i class="fa fa-globe"></i>open</a></td>';
                                          echo '</tr>';
                                      }
                                      
                                  }
                                  ?>


                                  </tbody>
                            </table>
                            <button type="submit" name="submit_files" class="btn btn-sm btn-round btn-secondary"> Go </button>
                          </form>
                        </div>
                        
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
                          <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action" id="tbl_rmd">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">NR </th>
                                  <th class="column-title">Date</th>
                                  <th class="column-title">Time </th>
                                  <th class="column-title">Frequency </th>
                                  <th class="column-title">Clarity </th>
                                  <th class="column-title">Direction </th>
                                  <th class="column-title">Subject/Convo </th>
                                  <th class="column-title">Callsign </th>
                                  <th class="column-title">Reciever </th>
                                  <th class="column-title">FC </th>
                                  <th class="column-title">SRC </th>
                                  <th class="column-title">Barangay </th>
                                  <th class="column-title">Municipality </th>
                                  <th class="column-title">Province </th>
                                  <th class="column-title">Grid Coordinate </th>
                                  
                                  </th>
                                  <th class="bulk-actions" colspan="16">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php
                                  $a = 0;
                                    
                                    if($saved_locations->getRMD() == false){
                                        echo 'no data';
                                    }
                                    else{
                                        foreach($saved_locations->getRMD() as $row){
                                            echo '<tr>';
                                            echo ' <td>'.$a++.'</td>';
                                            echo ' <td>'.$row['date'].'</td>';
                                            echo ' <td>'.$row['time'].'</td>';
                                            echo ' <td>'.$row['frequency'].'</td>';
                                            echo ' <td>'.$row['clarity'].'</td>';
                                            echo ' <td>'.$row['direction'].'</td>';
                                            echo ' <td>'.$row['subject'].'</td>';
                                            echo ' <td>'.$row['callsign'].'</td>';
                                            echo ' <td>'.$row['reciever'].' '.$row['time'].'</td>';
                                            echo ' <td>'.$row['fc'].'</td>';
                                            echo ' <td>'.$row['src'].'</td>';
                                            echo ' <td>'.$row['barangay'].'</td>';
                                            echo ' <td>'.$row['municipality'].'</td>';
                                            echo ' <td>'.$row['province'].'</td>';
                                            echo ' <td>'.$row['grid_coordinate'].'</td>';
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


        <!-- modal for adding rmd -->
        <div class="modal fade add_rmd_modal" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add RMD</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/upload_kml.inc.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="frequency">Frequency</label>
                            <input type="text" class="form-control" name="frequency">
                        </div>
                        <div class="form-group">
                            <label for="clarity">Clarity</label>
                            <input type="text" class="form-control" name="clarity">
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction</label>
                            <input type="text" class="form-control" name="direction">
                        </div>
                        <p id="conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="subject">Subject/Convo</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Callsign</label>
                            <input type="text" class="form-control" name="callsign">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Reciever</label>
                            <input type="text" class="form-control" name="reciever">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Fc</label>
                            <input type="text" class="form-control" name="fc">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">SRC</label>
                            <input type="text" class="form-control" name="src">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Region</label>
                            <select id="region" class="form-control"></select>
                            <input type="hidden" name="region_text" id="region-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Province</label>
                            <select id="province" class="form-control"></select>
                            <input type="hidden" name="province_text" id="province-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">City</label>
                            <select id="city" class="form-control"></select>
                            <input type="hidden" name="city_text" id="city-text">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Barangay</label>
                            <select id="barangay" class="form-control"></select>
                            <input type="hidden" name="barangay_text" id="barangay-text">
                        </div>
                        <div class="form-group">
                            <label for="grid">Grid Coordinates</label>
                            <input type="text" class="form-control" name="grid">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_rmd_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
        <!-- end rmd modal -->

        <!-- start selector modal -->

        <div class="modal fade add_selector_modal" tabindex="-1" id="add_modal" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Selector</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                      <form method="POST" action="../includes/upload_kml.inc.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Name">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <select name="company" class="form-control">
                                  <option value="SRC1">SRC1</option>
                                  <option value="SRC2">SRC2</option>
                                  <option value="SRC3">SRC3</option>
                                  <option value="SRC4">SRC4</option>
                                  <option value="SRC5">SRC5</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="name">Name/Alias</label>
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
                        <p id="conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="selector_name">Selector/Cp Number</label>
                            <input type="text" class="form-control" name="selector_name">
                        </div>
                        <div class="form-group">
                            <label for="imsi">IMSI</label>
                            <input type="text" class="form-control" name="imsi">
                        </div>
                        <div class="form-group">
                            <label for="imei">Imei</label>
                            <input type="text" class="form-control" name="imei">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time">
                        </div>
                        <div class="form-group">
                            <label for="lac_cid">LAC/CID</label>
                            <input type="text" class="form-control" name="lac_cid">
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
                            <input type="file" class="form-control" name="upload_kml">
                        </div>
                        
                    
                      </div>               
                    </div>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="submit_button" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- end selector modal -->

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
        $('#example').dataTable({
          "searching": true
        });

        var table = $('#example').DataTable();

        $("#example_length").append($("#categoryFilter"));
    

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
      

      function selector(){
        document.getElementById('add_button').setAttribute('onclick','addSelector()')
      }
      function rmd(){
       document.getElementById('add_button').setAttribute('onclick','addRmd()')
      }
      function addSelector(){
        $(".add_selector_modal").modal("show");
      }
      function addRmd(){
    
        $(".add_rmd_modal").modal("show");
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