<?php	
require ("function.php");// Including the db Connection
//index.php

?>
<html lang="en">
<head>
  <title>E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body,
html {
    width: 100%;
    height: 100%
}
.masthead {
    min-height: 30rem;
    position: relative;
    display: table;
    width: 100%;
    height: auto;
    padding-top: 8rem;
    padding-bottom: 8rem;
    background: linear-gradient(90deg, rgba(255, 255, 255, .1) 0, rgba(255, 255, 255, .1) 100%), url(Banner/bg.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover
}
.masthead h1 {
    font-size: 4rem;
    margin: 0;
    padding: 0
}
@media (min-width: 992px) {
    .masthead {
        height: 100vh
    }
    .masthead h1 {
        font-size: 5.5rem
    }
}
.map {
    height: 60rem
}
</style>
  </head>
<body>
<header class="masthead d-flex">  
        <div class="container text-center" style="padding:200;">
        <h1 class="mb-1">E-Commerce Site</h1>
        <h3 class="mb-5">
          Order Food you like
        </h3>
        <a class="btn btn-primary " href="menu.php">Go to Menu</a>
      
	  </div>
      <div class="overlay"></div>
    </header>
	<div style="width:100%; height:35%; background-color:steelblue;">
	</div>
 
     <section id="contact" class="map">
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
      <br/>
      <small>
        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
      </small>
    </section>  
    
<footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Your Website 2017</p>
      </div>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</body>
</html>
