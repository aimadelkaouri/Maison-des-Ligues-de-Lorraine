<?php
session_start();
if (isset($_SESSION['login'])) {
    include 'navbar.php';
 }else {
    include 'navbar.php';
 }
require 'database.php';

if (isset($_POST['contact'])) {
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $objet=$_POST['objet'];
    $message=$_POST['message'];


    $stm=$bdd->prepare("INSERT INTO contact(nom,email,objet,message) VALUES (?,?,?,?)");
    $stm->execute(array($nom,$email,$objet,$message));
}
?>
<!-- Wrapper container -->
<div class="container py-4">

    <!-- Bootstrap 5 starter form -->
    <form  data-sb-form-api-token="API_TOKEN" method="post" class="container">
  
      <!-- Name input -->
      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control"  type="text" placeholder="Name" data-sb-validations="required" name="nom" />
        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
      </div>
  
      <!-- Email address input -->
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Email Address</label>
        <input class="form-control" name="email" type="email" placeholder="Email Address" data-sb-validations="required, email" />
        <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
        <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
      </div>

      <div class="mb-3">
        <label class="form-label" for="subject">Subject</label>
        <input class="form-control" name="objet" type="text" placeholder="subjcet" data-sb-validations="required" />
      </div>


  
      <!-- Message input -->
      <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea class="form-control" name="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
        <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
      </div>
  
      <!-- Form submissions success message -->
      <div class="d-none" id="submitSuccessMessage">
        <div class="text-center mb-3">Form submission successful!</div>
      </div>
  
      <!-- Form submissions error message -->
      <div class="d-none" id="submitErrorMessage">
        <div class="text-center text-danger mb-3">Error sending message!</div>
      </div>
  
      <!-- Form submit button -->
      <div class="d-grid">
      <input type="hidden" name="contact" value="1">
        <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
      </div>
  
    </form>
  
  </div>
  
  <!-- SB Forms JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Sélectionnez tous les champs avec l'attribut data-sb-validations="required"
  var $requiredFields = $('[data-sb-validations="required"]');
  var $submitButton = $('#submitButton');

  // Surveillez les changements dans les champs requis
  $requiredFields.on('input', function() {
    // Vérifiez si tous les champs requis sont valides
    var allFieldsValid = true;
    $requiredFields.each(function() {
      if ($(this).val() === '') {
        allFieldsValid = false;
        return false; // Sortez de la boucle si un champ est vide
      }
    });

    // Activez ou désactivez le bouton en conséquence
    if (allFieldsValid) {
      $submitButton.removeClass('disabled');
    } else {
      $submitButton.addClass('disabled');
    }
  });
});
</script>


</section>
<!--Section: Contact v.2-->

<?php include 'footer.php' ?>