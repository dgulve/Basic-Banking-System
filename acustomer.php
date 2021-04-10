<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"bank");
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparks | Customers</title>
    <!-- Including the bootstrap CDN -->
    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Including style sheet-->
    <link rel="stylesheet" href="index.css">
    <!-- Icon -->
    <link rel="icon" height="50px" href="./images/icon.png">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
.btn-default{
    background-color: #800000;
    border:2px solid #800000;
    color:white;
    font-weight: 600;
  }

  .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    border: 2px solid #800000;
    color:pink;
    background-color: transparent;
    font-weight: 600;
    -ms-transform: scale(1.2); /* IE 9 */
    transform: scale(1.1);
  }
</style>
<body style="background-color:#aaaeaf4d;" onload="loader()">
<!-- loader for splash screen -->
<div id="loading">
    <div class="wrapper flex-center">
        <div class="container">
            <div class="container-dot dot-a">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-b">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-c">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-d">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-e">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-f">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-g">
            <div class="dot"></div>
            </div>
            <div class="container-dot dot-h">
            <div class="dot"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid myclass" style="padding:0px; margin:0px;">
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm  navbar-toggler navbar-light" style="background-color:transparent; background-color:#aaaeaf4d; opacity:1;">  
            &nbsp;
            <div class="navbar-brand font-weight-bold " id="title" data-anijs="if: mouseover, do: slideInUp animated" style="color:black;font-family: 'Roboto Condensed', sans-serif;font-weight: normal;font-size:2em;">
                &nbsp;Banking System
            </div>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="float:right;">
                <ul class="navbar-nav ml-auto font-weight-bold"  style="font-size:small; color:pink; "> 
                <li class="nav-item">
                        <a class="nav-link " href="index.php" style="color:black;font-weight:1em;font-size: 20px;">
                            <div style="padding-right:0px;" >
                                
                            </div>
                            <span style="padding-right:20px;font-family: 'Roboto Condensed', sans-serif;" >&nbsp;&nbsp;Home</span>
                        </a> 
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="viewcustomers.php" style="color:black;font-weight:1em;font-family: 'Roboto Condensed', sans-serif;font-size: 20px;">
                            <div style="padding-left:20px;" >
                               
                            </div>
                            View Customers
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transferrecords.php" style="color:black;font-weight:1em;font-family: 'Roboto Condensed', sans-serif;font-size: 20px;">
                            <div style="padding-left:20px;" >
                               
                            </div>
                            Transfer Records
                        </a> 
                    </li>  
                </ul> 
            </div>
        </nav> 
    
    <div>
<div class="acustomer" style="margin:2%;">
<div class="row">
    <div class="col-sm" style="padding:1% 3%;">
 
    <img  height="50" src="./images/arrow3.jpeg" alt="" style="display:inline;">&nbsp;
    <div style="padding-top:2%;display:inline;"><h4 class="font-weight-bold" style="color:black;font-size:2em;;display:inline;margin:10px 5px 0px 5px;padding-top:1%">Customer Details</h4>
    </div>
        <br><br>
        <div style="font-size:1.2em;">
        <?php
        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customers WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b class='font-weight-bold'>User ID</b> &nbsp;: ".$row['customer_id']."</p><br>";
            echo "<p name='sender'><b class='font-weight-bold'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['name']."</p><br>";
            echo "<p><b class='font-weight-bold'>Email ID</b> : ".$row['email']."</p><br>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp; :&nbsp;<b>&#8377;</b> ".$row['current_balance']."</p>";
          }         
        }
      ?>
      </div>
    </div>
    <div class="col-sm" style="padding:1% 3%;">
        <div >
                    <form action="transfer.php" method="POST">
                        
                    <img  height="50" src="./images/arrow3.jpeg" alt="" style="display:inline;">&nbsp;
                    <div style="padding-top:2%;display:inline;">
                    <span class="font-weight-bold" style="color:black;font-size:1.8em;line-height:1em;display:inline;margin:10px 5px 0px 5px;padding-top:1%">Money Transfer</span>
                    </div><br><br>
                    <b style="font-size:1.2em;">Sender</b> : <span style="font-size:1.2em;"><input id="myinput" name="sender" disabled type="text" style="width:40%;border:none;background-color: #D6DBDF;" value='<?php echo "$user";?>'></input></span>

                        <br><br><br>
                        <b style="font-size:1.2em;">Select Reciever:</b>
                <select style="background-color: #aaaeaf4d;border-color: #aaaeaf4d;"name="reciever" id="dropdown" required>
                    <option>Select Reciever</option>
                <?php
                $db = mysqli_connect("localhost", "root", "", "bank");
                $res = mysqli_query($db, "SELECT * FROM customers WHERE Name!='$user'");
                while($row = mysqli_fetch_array($res)) {
                    echo("<option> "."  ".$row['name']."</option>");
                }
                ?>
                </select>
                <br><br><br>
                        <b style="font-size:1.2em;">Amount to be transferred &#8377;:</b>
                        <input name="amount" type="number" style="width:35%;background-color: #aaaeaf4d;border-color: #aaaeaf4d; min="100" required >
                        <br><br><br>
                        <button id="transfer"  name="transfer" class="btn btn-default" style='background-color:#040945  ; border-color:#040945  ;' ><b>Transfer</b></button>
                        </form>
        </div>
    </div>
</div>
<div style="padding-top:4rem;">

</div>
</body>
<!-- footer starts-->
<div id="footer" class="footer-dark" style="background-color:white;border:2px solid grey;width:100%;height:200px;padding-top:1rem;>
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
<!-- footer ends-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
setTimeout(function(){$('#loading').hide();}, 3000); 
  var preloader = document.getElementById("loading");
      function loader(){
        preloader.style.display = 'none';
      }
</script>
</html>
