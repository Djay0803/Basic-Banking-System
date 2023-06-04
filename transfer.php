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
        </header>

        <?php
            if(isset($_GET["balance"])){
                echo "<script> alert('Insufficient Balance!'); </script>";
            }
            if(isset($_GET["transfer"])){
                echo "<script> alert('Fund Transfered Successfully!'); </script>";
            }
            if(isset($_GET["transfer_failed"])){
                echo "<script>alert('Fund Transfered Failed!');</script>";
            }
            if(isset($_GET["same_account"])){
                echo "<script>alert('You choose same account number in both the table please try again');</script>";
            }
        ?>        

        <div style="padding-top:100px;padding-left:10px">
            <a href="index.php" class="btn btn-outline-success btn-lg"><img src="back.png" style="width: 40px;">Back</a>
        </div>

        <?php
            require 'database.php';

            $sql6 = "Select * FROM customer";
            $result_check6= $conn->query($sql6);
            $num6 = mysqli_num_rows($result_check6);
        ?>

        <form action="transfer_action.php" method="post">
            <div class="row" style="padding-top:100px;">
                <h1><center>Money Transfer</center></h1>
                <div class="col-sm-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">From</span>
                        <select class="form-select" aria-label="Default select example" name="fromaccount" >
                            <!-- <option selected></option> -->
                            <?php 
                                $sr = 1;
                                for($i=1;$i<=$num6;$i++){
                                    $num7 = mysqli_fetch_assoc($result_check6);
                                    $account_no = $num7['account_no'];
                                    echo '<option value='.$account_no.'>'.$account_no.'</option>';
                                    $sr=$sr+1;
                                }
                            ?>
                        </select>
                        <!-- <input type="number" name="fromaccount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg"> -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">To</span>
                        <select class="form-select" aria-label="Default select example" name="toaccount" >
                            <!-- <option selected></option> -->
                            <?php 
                                $sql7 = "Select * FROM customer";
                                $result_check7= $conn->query($sql7);
                                $num8 = mysqli_num_rows($result_check7);
                                $sr1 = 1;
                                for($i=1;$i<=$num8;$i++){
                                    $num9 = mysqli_fetch_assoc($result_check7);
                                    $account_no = $num9['account_no'];
                                    echo '<option value='.$account_no.'>'.$account_no.'</option>';
                                    $sr1=$sr1+1;
                                }
                            ?>
                        </select>
                        <!-- <input type="number" name="toaccount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg"> -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group input-group-lg">
                        <input type="number" name="amount" placeholder="Enter amount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                    </div>
                </div>
                <div class="col-sm-4"> </div>
                <div class="col-sm-4 mt-4 d-flex justify-content-center">
                <i class="fas fa-paper-plane"></i>
                    <input type="submit" name="transferfund" class="btn btn-primary btn-lg" value="Transfer Funds">
                </div>
            </div>
        </form>

        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>