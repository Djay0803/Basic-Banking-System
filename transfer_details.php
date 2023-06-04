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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }

            .all_customer{
                margin-top:10px;
            }

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

        <div style="padding-top:100px;padding-left:10px">
            <a href="index.php" class="btn btn-outline-success btn-lg"><img src="back.png" style="width: 40px;">Back</a>
        </div>

        <div class="all_customer">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Transfer From (A/C)</th>
                        <th>Transfer To (A/C)</th>
                        <th>Amount Transfer</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php
                        require 'database.php';

                        $sql10 = "Select * FROM transaction_history";
                        $result_check10= $conn->query($sql10);
                        $num10 = mysqli_num_rows($result_check10);
                        $sr = 1;
                        for($i=1;$i<=$num10;$i++){
                            $num11 = mysqli_fetch_assoc($result_check10);
                            $id = $num11['id'];
                            $from_account = $num11['from_account'];
                            $to_account = $num11['to_account'];
                            $date = $num11['date'];
                            $tansfer_amount = $num11['transfer_amount'];
                            echo "<tr>
                                    <td>$sr</td>
                                    <td>$from_account</td>
                                    <td>$to_account</td>
                                    <td>&#x20b9 $tansfer_amount</td>
                                    <td>$date</td>
                                </tr>";
                                $sr=$sr+1;
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            } );
        </script>


        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>