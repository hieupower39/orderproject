
<footer>
    <div class="container-fluid padding">
      <div class="row text-center">
        <div class="col-md-4">
          <hr class="light">
          <img src="image/logo.jpg" height="100px">
          <hr class="light">
          <p>111-222-333</p>
          <p>example@gmail.com</p>
          <p>03, Vũ Phạm Hàm, Hà Nội, Việt Nam</p>
        </div>
      </div>
    </div>
  </div>
  </footer>
  <script src="./javascript/products.js"></script>
  <script src="./javascript/cart.js"></script>
  
      <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Onclick add to cart -->
    <script src="https://kit.fontawesome.com/45fc33f30e.js" crossorigin="anonymous"></script>
    <script> 
    cartAlert();
    </script>

<?php
    unset($_SESSION["auth"]);
?>