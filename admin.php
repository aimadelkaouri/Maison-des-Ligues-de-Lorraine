<?php
session_start();
require 'database.php';
include 'navbar.php';
?>
<div class="container mt-5 mb-5">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="image/publier.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;"><a href="adminactualite.php">Actualité</a> </h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="image/publier.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;"><a href="">Offre d'emplois</a> </h5>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="image/users.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;"><a href="">Utilisateurs</a> </h5>
      </div>
    </div>
  </div>
  
</div>
</div>
<?php include 'footer.php'?>
