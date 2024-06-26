<?php 
   // Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])){
    header("location: ../../login");
    exit;
}
   
   // including the database connection file
   include "../../db_conn.php";
   
   //getting id from url
   $id = $_GET['id'];
   
   //selecting data associated with this particular id
   $result = mysqli_query($conn, "SELECT * FROM `plugins` WHERE id=$id");
   
   while($res = mysqli_fetch_array($result))
   {
      $id = $res['id'];
      $plugin_name = $res['plugin_name'];
      $file_type = $res['file_type'];
      $image_url = $res['image_url'];
      $plugin_url = $res['plugin_url'];
      $plugin_version = $res['plugin_version'];
      $new_date = $res['created_at'];
      $update_date = date("Y-m-d", strtotime($new_date));
      $file = $res['plugin_file'];
      $file_src = "../../assets/plugin/".$file;  
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>Website Protfolio </title>
      <meta content="Admin Dashboard" name="description" />
      <meta content="Themesbrand" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App Icons -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico">
      <!-- DataTables -->
      <link href="../../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="../../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- C3 charts css -->
      <link href="../../plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">
      <link href="plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
      <!-- App css -->
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
   <?php include ('../../includes/sidebar.php'); ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Unit -</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    
                <!--     <div class="col-lg-7">
                        <div class="card m-b-20">
                            <div class="card-header" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Click Here To View Full Image
                            </div>
                                                    
                           <div class="collapse" id="collapseExample">
                             <div class="card card-body">

                                <blockquote class="card-blockquote mb-3">
                                 <button class="btn btn-secondary shadow border waves mb-3 ">
                                    <i class="mdi mdi-eye"></i>
                                    <a class="text-light"href="<?php echo $file_src;  ?>" download="<?php echo $plugin_name;?>" >Download Image</a></button>

                                    <img src='<?php echo $image_url;  ?>' class="img-fluid">
                            

                                    <footer class="blockquote-footer text-muted">
                                        Posted By <cite title="Source Title"> Admin</cite>
                                    </footer>
                                </blockquote>
                            </div>
</div>

                            
                        </div>
                    </div> -->
                    <div class="col-lg-4">
                        <div class="card m-b-20">
                            <div class="card-header">
                                Portfolio Details
                            </div>
                            <div class="card-body">
                              <a href="<?php echo $image_url;  ?>">
                                    <img src='<?php echo $image_url; ?>' class="auto img-fluid" alt="<?php echo $plugin_name;?> Image Not Found" disabled>
                                    </a>
                                <blockquote class="card-blockquote mb-0">
                                 
                                    <h4 class="page-title"><?php echo $plugin_name;?></h4>
                                    <hr>
                                    <h5>File Type : <?php echo $file_type ?></h5>
                                    <h5>Version : <?php echo $plugin_version ?></h5>


                                   
                                    <p>Click Here To Visit Plugin | Theme Webiste : <a href="<?php echo $plugin_url; ?>" target="_blank">Webiste Link</a></p>
                                    <footer class="blockquote-footer text-muted">
                                        Created Date <cite title="Source Title"><?php echo $update_date; ?></cite>
                                    </footer>
                                    <button class="btn btn-success shadow border waves mt-2 mb-3 ">
                                    <i class="mdi mdi-download"></i>
                                    <a class="text-light"href="<?php echo $file_src;?>" download="<?php echo $plugin_name;?>" >Download File</a></button>
                                </blockquote>
                            </div>
                        </div>
                    </div>

                    </div>

                </div>

             



            </div> <!-- end container -->
        </div>


<style type="text/css">
   .auto {
  width: 100%;
  height: 350px;
  object-fit: cover;
  object-position: top;
}

</style>
      
   <?php include ('../../includes/footer.php'); ?>
   <!-- jQuery  -->
   <script src="../../assets/js/jquery.min.js"></script>
   <script src="../../assets/js/bootstrap.bundle.min.js"></script>
   <script src="../../assets/js/modernizr.min.js"></script>
   <script src="../../assets/js/waves.js"></script>
   <script src="../../assets/js/jquery.slimscroll.js"></script>
   <script src="../../assets/js/jquery.nicescroll.js"></script>
   <script src="../../assets/js/jquery.scrollTo.min.js"></script>
   <!-- Peity chart JS -->
   <script src="../../plugins/peity-chart/jquery.peity.min.js"></script>
   <!--C3 Chart-->
   <script src="../../plugins/d3/d3.min.js"></script>
   <script src="../../plugins/c3/c3.min.js"></script>
   <!-- KNOB JS -->
   <script src="../../plugins/jquery-knob/excanvas.js"></script>
   <script src="../../plugins/jquery-knob/jquery.knob.js"></script>
   <!-- Page specific js -->
   <script src="../../assets/pages/dashboard.js"></script>
   <!-- App js -->
   <script src="../../assets/js/app.js"></script>
   <script src="../../plugins/alertify/js/alertify.js"></script>
   <script src="../../assets/pages/alertify-init.js"></script>
</div>
</div>
</body>
</html>