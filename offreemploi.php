<?php 
session_start();

if (isset($_SESSION['login'])) {
    include 'navbar1.php';
 }else {
    include 'navbar.php';
 }
require 'database.php';

?>
      <div class="container">
              <section class="container mt-5 mb-5">
        <?php
              $stm=$bdd->query("SELECT * FROM offreemploi");
              while ($res=$stm->fetch()) { ?>
                <div class="card mt-5">
                <div class="card-header">
                <?=$res['cat']?>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?=$res['titre']?></h5>
                  <p class="card-text"><?=$res['accroche']?></p>
                  <a href="offredetaillee.php?id=<?=$res['id']?>" class="btn btn-primary">Voir Plus</a>
                </div>
              </div> <?php
              } ?>
      </section>
      </div>

<?php include 'footer.php'?>