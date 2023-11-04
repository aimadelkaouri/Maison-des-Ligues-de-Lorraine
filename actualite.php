<?php
session_start();
if (isset($_SESSION['login'])) {
    include 'navbar1.php';
 }else {
    include 'navbar.php';
 }
require 'database.php';
?>
      <section class="container mt-5">
        <div class="row">
            <div class="col-md-4">
            <?php
            $stm=$bdd->query('SELECT * FROM actualite');
            while ($res=$stm->fetch()) {
                ?>
                <div class="card mb-4" style="width: 18rem;">
                    <img src="upload_directory/<?= $res['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><a href="act.php?id=<?=$res['id']?>"style="text-decoration: none;"><?= $res['titre'] ?></a></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </section>

<?php include 'footer.php' ?>