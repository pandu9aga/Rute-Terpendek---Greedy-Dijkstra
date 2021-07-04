<!DOCTYPE html>
<?php
require("RunTest.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Penentuan Rute Terpendek - Dijkstra</title>

   <!-- Custom fonts for this template-->
   <link href="sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="sb_admin/css/sb-admin-2.min.css" rel="stylesheet">

 </head>

 <body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
           <a href="index.php">
             <b>
               <h5 style="color:#fff;">Penentuan Rute Terpendek - Dijkstra</h5>
             </b>
           </a>
         </nav>
         <!-- End of Topbar -->

         <!-- Begin Page Content -->
         <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Dijkstra</h1>
           </div>

           <!-- Content Row -->
           <div class="row">

           </div>

           <!-- Content Row -->

           <div class="row">

             <!-- Area Chart -->
             <div class="col-xl-8 col-lg-7">
               <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Peta Graph</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                   <img class="img-fluid" src="img/peta_graph_bondowoso.png" alt="peta_graph_bondowoso">
                 </div>
               </div>
             </div>

             <div class="col-xl-4 col-lg-5">
               <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Pencarian Rute</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                  <form action="index.php" method="get">
                    <div class="mb-3">
                      <label for="dari">Dari</label>
                      <select name="dari" class="form-control" id="dari">
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                        <option value="e">e</option>
                        <option value="f">f</option>
                        <option value="g">g</option>
                        <option value="h">h</option>
                        <option value="i">i</option>
                        <option value="j">j</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="ke">Ke</label>
                      <select name="ke" class="form-control" id="ke">
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                        <option value="e">e</option>
                        <option value="f">f</option>
                        <option value="g">g</option>
                        <option value="h">h</option>
                        <option value="i">i</option>
                        <option value="j">j</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </form>
                 </div>
               </div>
               <?php
               if (isset($_GET['dari'],$_GET['ke'])) {
                 $dari = $_GET['dari'];
                 $ke = $_GET['ke'];

                 $path = runTest($dari,$ke);
                 ?>
                 <div class="card shadow mb-4">
                   <!-- Card Header - Dropdown -->
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Hasil Pencarian</h6>
                   </div>
                   <!-- Card Body -->
                   <div class="card-body">
                     <p>Rute terpendek dari <?php echo $dari; ?> ke <?php echo $ke; ?> adalah :</p>
                     <?php
                     if ($dari == $ke) {
                       echo $dari;
                     }else {
                       echo implode(' -> ', $path);
                     }
                     ?>
                   </div>
                 </div>
                 <?php
               }
               ?>

             </div>

           </div>

         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <!-- Footer -->
       <footer class="sticky-footer bg-white">
         <div class="container my-auto">
           <div class="copyright text-center my-auto">
             <span>Copyright &copy; Rute Dijkstra 2021</span>
           </div>
         </div>
       </footer>
       <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
   </a>

   <!-- Bootstrap core JavaScript-->
   <script src="sb_admin/vendor/jquery/jquery.min.js"></script>
   <script src="sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="sb_admin/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="sb_admin/vendor/chart.js/Chart.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="sb_admin/js/demo/chart-area-demo.js"></script>
   <script src="sb_admin/js/demo/chart-pie-demo.js"></script>

 </body>

 </html>
