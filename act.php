<?php
session_start();
if (isset($_SESSION['login'])) {
    include 'navbar1.php';
 }else {
    include 'navbar.php';
 }
require 'database.php';

$id= $_GET['id'];

$stm=$bdd->prepare('SELECT * FROM actualite WHERE id=?');
$stm->execute(array($id));
$res=$stm->fetch();

?>


<body>
    <div class="act1">
        <img src="<?= $res['image']?>"> <br>
        <h1><?=$res['titre']?></h1> <br>
        <h3><?=$res['description']?></h3> <br>
        <p><?=$res['contenu']?></p>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>