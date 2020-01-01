<?php  
 include "connect.php";
 $conn = OpenCon();
  
 $char = '';  
 if(isset($_GET["char"]))  
 {  
      $char = $_GET["char"];  
      $char = preg_replace('#[^a-z]#i', '', $char);  
      $query = "SELECT * FROM species WHERE species_name LIKE '$char%'";  
 }  
 else  
 {  
      $query = "SELECT * FROM species ORDER BY species_id";  
 }  
 $result = mysqli_query($conn, $query);  
 ?>  

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Creative - Start Bootstrap Theme</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

  <!-- Paganation Menu -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

</head>

<body id="page-top">

   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="home.html">B.A.R.G.D.B.</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          <a class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" href="#">Sign In</a>
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="browse.html">Browse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="submission.html">Submission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="download.html">Downloads</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about.html">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="id01" class="modal">
  
      <form class="modal-content animate" action="/action_page.php">
    
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
            
          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw"><a href="#">Forgot password?</a></span>
        </div>
      </form>
    </div>
    
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

<!-- Browse Section -->
<section class="page-section bg-success" id="species">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h2 class="text-white mt-0">Species</h2>
        <hr class="divider light my-4">
        <p class="text-white-50 mb-4">Our curated library of samples collected from researchers.</p>
      </div>
    </div>
  </div>
</section>

  <!-- Menu Section -->
  <section class="page-section bg-gray" id="menu">
    <div class="container">
      <div class="row justify-content-center">
      <div>  
                     <?php  
                          $character = range('A', 'Z');  
                          echo '<ul class="pagination">';  
                          foreach($character as $alphabet)  
                          {  
                               echo '<li><a href="index.php?character='.$alphabet.'">'.$alphabet.'</a></li>';  
                          }  
                          echo '</ul>';  
                     ?>  
                     </div>  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">ID</th>  
                               <th width="40%">Species Name</th>  
                               <th width="40%">Species Family</th>  
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["species_id"]; ?></td>  
                               <td><?php echo $row["species_name"]; ?></td>  
                               <td><?php echo $row["species_family"]; ?></td>  
                          </tr>  
                          <?php  
                               }  
                          }  
                          else  
                          {  
                          ?>  
                          <tr>  
                               <td colspan="3">Data not Found</td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Borneo Antibiotic Resistant Gene Database</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

  <!-- Paganation Menu -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
