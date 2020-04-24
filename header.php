

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="font-size: 20px">

 <a class="navbar-brand" href="index.php">
<img class="img" src="img/logo8.png" title='Home'>
</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#something">
      <span class="navbar-toggler-icon" style="color: #000000"></span>
      </button>

       

    <div class="collapse navbar-collapse justify-content-end" id="something">
    <ul class="navbar-nav"  style="font-family: times new roman">
      <li class="nav-item">
        <a class="nav-link" style="color: #000000" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #000000" href="service.php">Sevices</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #000000" href="contactus.php">Contact Us</a>
      </li>

          <?php
          session_start();
          if(isset($_SESSION['user']))
          {
            $conn = new mysqli('localhost','root', '', 'buss');
            $conn1 = new mysqli('localhost', 'root', '', 'buss_user');
            $myemail=$_SESSION['user'];

            $sql= "Select register.*,register1.* from register INNER JOIN register1 ON register.id=register1.id where email='$myemail'";
            $result=mysqli_query($conn,$sql);


            $row=mysqli_fetch_array($result);
            $_SESSION['myid'] = $row['id'];
            $cart = $row['id'];
            $cart = "user$cart";

            $sql1 = "select * from $cart";
            $result1 = mysqli_query($conn1,$sql1);
            $row1=mysqli_fetch_array($result1);
            $cart1 = mysqli_num_rows($result1);

              ?>
            <li class="nav-item">
            <a class="nav-link" style="color: #000000" href="welcome.php"><?php echo $row['name'];?></a>
          </li>


          <li class="nav-item">
      <a class="nav-link" style="color: #000000" href="cart.php"><i class="fas fa-shopping-cart" style="font-size:25px" title='Cart'> <span class="badge badge-danger"><?php echo $cart1; ?>
      </span>
    </i>
  </a>
      </li>

            <li class="nav-item">
        <a class="nav-link" style="color:#000000" href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:25px" title='Logout'></i></a>
        </li>

        <?php }
        else{
            ?>
            <li class="nav-item">
            <a class="nav-link" style="color: #000000" href="login.php">Login</a>
            </li>
            <?php
        }
          ?>


    </ul>
    </div>

  </nav>


  <style>
      @import url('https://fonts.googleapis.com/css?family=Amita');

        @media only screen and (max-width: 768px){
    .img{
        width: 80%;
    }
    .navbar-brand{
        width: 79%;
    }
    li{
      text-align:center
    }
}
@media only screen and (min-width: 768px)
{
  .badge{
    top: 24px;
    font-size: 0.85rem;
    position: absolute;
    right: 51px;
    font-family: sans-serif;
  }

.img{
    width: 65%;
}
}
nav{
  background-color:#e5ee6e
}
      </style>



