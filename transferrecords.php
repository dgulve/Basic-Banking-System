<?php
    $con = mysqli_connect("localhost", "root", "", "bank");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <!-- Including the bootstrap CDN -->
    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Including style sheet-->
    <link rel="stylesheet" href="index.css">
    <!-- Icon -->
    <link rel="icon" height="50px" href="./images/icon.png">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');

</style>
<body style="background-color: #fff" onload="loader()">

<!--Navbar starts-->
<div class="container-fluid myclass" style="padding:0px; margin:0px;">
        <nav class="navbar navbar-expand-sm  navbar-toggler navbar-light" style="background-color:transparent; background-color:#aaaeaf4d; opacity:1;">  
            <!--<img  style="border-radius: 25px;" height="90"src="./images/bank_icon.jpeg">-->
            &nbsp;
            <div class="navbar-brand font-weight-bold " id="title" data-anijs="if: mouseover, do: slideInUp animated" style="color:black;font-family:'Roboto Condensed', sans-serif;font-size:2em;">
                &nbsp;THE FDFC BANK 
            </div>
            
        </nav> 
    
    <div>

<!-- my navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border ">     
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=".\index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=".\viewcustomers.php">VIEW CUSTOMERS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--my navbar ends-->
<!--Navbar ends-->

<div class="usertable">

    <h3 class="font-weight-bold"style="text-align:center;color:black;font-family: 'Roboto Condensed', sans-serif;font-size:2.2em;padding:3%;">Transactions</h3>
    <table id="myTable">
          <tr style="border: 3px solid black;">
            <th style="background-color: #aaaeaf4d;border-color: black;color: black">Transfer ID</th>
            <th style="background-color: #aaaeaf4d;border-color: black;color: black">Sender</th>
            <th style="background-color: #aaaeaf4d;border-color: black;color: black">Receiver</th>
            <th style="background-color: #aaaeaf4d;border-color: black;color: black">Amount</th>
            
          </tr>
          <?php
        $sql = "SELECT * FROM `transfer` ORDER BY transfer_id DESC LIMIT 10";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<form method ='post' action = 'acustomer.php'>";
            echo "<td style='background-color: #aaaeaf4d;border-color: black;color: black'>". $row['transfer_id'] . "</td>
            <td style='background-color: #aaaeaf4d;border-color: black;color: black'>". $row['sender'] . "</td>
            <td style='background-color: #aaaeaf4d;border-color: black;color: black'>". $row['receiver'] . "</td>
            <td style='background-color: #aaaeaf4d;border-color: black;color: black'>". $row['amount'] . "</td>";
            echo "</form>";
         echo  "</tr>";
        }
        ?>
    </table>
</div>
<br><br>

</body>

<!--footer starts-->
<div id="footer" class="footer-dark" style="background-color:white;border:2px solid grey;width:100%;height:200px;>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>FDFC BANK</h3>
                        <p>TASK1 for the sparks foundation.Under the domain web development.Task 1 is to make a basic bank website. </p>
                    </div>
                    <span>
                    <a href="#" class="fa fa-facebook"></a>
                    &nbsp;
                    <a href="#" class="fa fa-twitter"></a>
                    &nbsp;
                    <a href="#" class="fa fa-google"></a>
                     &nbsp;
                    <a href="#" class="fa fa-linkedin"></a>
                    &nbsp;
                    <a href="#" class="fa fa-youtube"></a>
                    &nbsp;
                    <a href="#" class="fa fa-instagram"></a>
                    </span>
                </div>
                <p class="copyright">FDFC bank © 2021</p>
            </div>
        </footer>
    </div>
<!--footer ends-->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
setTimeout(function(){$('#loading').hide();}, 3000); 
  var preloader = document.getElementById("loading");
      function loader(){
        preloader.style.display = 'none';
      }
</script>


</html>