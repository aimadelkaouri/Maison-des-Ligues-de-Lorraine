<?php
session_start();
require 'database.php';
if (isset($_SESSION['login'])) {
    include 'navbar.php';
 }else {
    include 'navbar.php';
 }


 if (isset($_POST['seconnecter'])) {
  $email = $_POST['email'];
  $motdepasse = $_POST['motdepasse'];

  $stm = $bdd->prepare('SELECT * FROM user WHERE email = ?');
  $stm->execute(array($email));

  if ($stm->rowCount() > 0) {
      $res = $stm->fetch();

      // Utilisez password_verify pour vérifier le mot de passe
      if (password_verify($motdepasse, $res['motdepasse'])) {
          $_SESSION['login'] = true;
          $_SESSION['email'] = $res['email'];
          
          if ($res['role'] == "admin") {
              header('location: admin.php');
          } elseif ($res['role'] == "user") {
              header('location: index.php');
          }
      } else {
          // Le mot de passe est incorrect
          // Gérez l'erreur d'authentification
          echo "Mot de passe incorrect";
      }
  } else {
      // L'utilisateur n'existe pas
      // Gérez l'erreur d'authentification
      echo "Utilisateur non trouvé";
  }
}
?>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email"  class="form-control form-control-lg" name="email"/>
            <label class="form-label" for="form1Example13" >Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password"  class="form-control form-control-lg" name="motdepasse" />
            <label class="form-label" for="form1Example23" >Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block" name="seconnecter" >Sign in</button>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>

          <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
            role="button">
            <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
          </a>
          <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
            role="button">
            <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>