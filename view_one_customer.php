<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Welcome to PDBL Bank</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="image/PDBL.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <style>
          .body{
            background: url("9.jpg");
          } 
          .dropdown{
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          } 
        </style>

    </head>

  <body class=body>
      <!-- ======= Header ======= -->
      <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">
          <div class="logo">
            <!-- Uncomment below if you prefer to use an text logo -->
              <h1>
                <a href="index.php">
                  <img src="image/PDBL.png" alt="" width="30" height="24" class="d-inline-block align-text-top">PDBL Bank
                </a>
              </h1> 
          </div>
        </div>
        <div class="dropdown">
          <button class="btn btn-outline dropdown-toggle" id="bd-versions" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
              <span class="d-none d-lg-inline">Please Select Account Holder Name</span>
          </button>
      
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <?php
                  require 'database.php';

                  $sql = "Select * FROM customer";
                  $result_check2= $conn->query($sql);
                  $num2 = mysqli_num_rows($result_check2);
                  for($i=1;$i<=$num2;$i++){
                      $num3 = mysqli_fetch_assoc($result_check2);
                      $name = $num3['name'];
                      echo "<li><a class='dropdown-item' href='view_one_customer.php?id=".$num3['id']."'>$name</a></li>";
                  }
              ?>
          </ul>
        </div> 
      </header>
      <div style="padding-top:100px;padding-left:10px">
        <a href="index.php" class="btn btn-outline-success btn-lg"><img src="back.png" style="width: 40px;">Back</a>
      </div>

      <?php
        require 'database.php';
        if(isset($_GET['id'])){
            $sql3 = "Select * from customer where id=".$_GET['id']."";
            $result_check3= $conn->query($sql3);
            $num4 = mysqli_fetch_assoc($result_check3);
            $id=$_GET['id'];
            $name=$num4["name"];
            $account_no=$num4["account_no"];
            $IFSC=$num4["IFSC"];
            $age=$num4["age"];
            $gender=$num4["gender"];
            $doa_create = $num4["doa_create"];
            $address=$num4["address"];
            $mobile_no=$num4["mobile_no"];
            $email=$num4["email"];
            $balance=$num4["balance"];
          }
          ?>
<?php
          if(isset($_GET['id'])){
?>
<form class="row g-3 m-4" id="printCustomerDetail">
<center><h4>Customer Detail's</h4></center>
<table class="table table-striped mb-5" >
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <th scope="col">Parameters</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Account Holder Name</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Account Number</td>
      <td><?php echo $account_no ?></td>   
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>IFSC Code</td>
      <td><?php echo $IFSC ?></td>   
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Balance Amount</td>
      <td><?php echo $balance ?></td>   
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Email</td>
      <td><?php echo $email ?></td>   
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Mobile</td>
      <td><?php echo $mobile_no ?></td>   
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Age</td>
      <td><?php echo $age ?></td>   
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Gender</td>
      <td><?php echo $gender ?></td>   
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Date Of Account Created</td>
      <td><?php echo $doa_create ?></td>   
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Address</td>
      <td><?php echo $address ?></td>   
    </tr>
  </tbody>
</table>
<div class="input-group justify-content-center">
  <button class="btn btn-outline-danger d-grid gap-2 col-4 mx-auto" type="button" onclick="printDiv('printCustomerDetail')" > Print</button>
</div>
</form>
<?php
          }
?>

      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/purecounter/purecounter.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script>
        function printDiv(printCustomerDetail) {
            var printContents = document.getElementById("printCustomerDetail").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
    </script>
  </body>
</html>