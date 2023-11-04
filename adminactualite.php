<?php
session_start();
include 'navbar2.php';
require 'database.php';
if (isset($_POST['postActualite'])) {
    $image= $_FILES['image']['name'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $titre=$_POST['titre'];
    $description= $_POST['description'];
    $contenu= $_POST['contenu'];

    // Specify the directory where you want to save the uploaded files
    $upload_dir = 'upload_directory/';
    $target_file = $upload_dir . $image;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($image_tmp, $target_file)) {
    $stm=$bdd->prepare('INSERT INTO actualite(image,titre,description,contenu) VALUES(?,?,?,?)');
    $stm->execute(array($image,$titre,$description,$contenu));
    }

}

?>

<!-- Wrapper container -->
<div class="container py-4">

    <!-- Bootstrap 5 starter form -->
    <form  data-sb-form-api-token="API_TOKEN" method="post" class="container" enctype="multipart/form-data">
      <!-- Name input -->
      <div class="mb-3">
        <label class="form-label" for="name">Image Upload</label>
        <input class="form-control"  type="file" placeholder="Name" data-sb-validations="required" name="image" />
        <div class="invalid-feedback" data-sb-feedback="name:required">Image is required.</div>
      </div>
            <!-- Name input -->
            <div class="mb-3">
        <label class="form-label" for="name">Tile</label>
        <input class="form-control"  type="text" placeholder="Name" data-sb-validations="required" name="titre" />
        <div class="invalid-feedback" data-sb-feedback="name:required">Title is required.</div>
      </div>
      <!-- Message input -->
      <div class="mb-3">
        <label class="form-label" for="message">Description</label>
        <textarea class="form-control" name="description" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
        <div class="invalid-feedback" data-sb-feedback="message:required">Description is required.</div>
      </div>
            <!-- Message input -->
            <div class="mb-3">
        <label class="form-label" for="message">Content</label>
        <textarea class="form-control" name="contenu" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
        <div class="invalid-feedback" data-sb-feedback="message:required">Content is required.</div>
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
      <input type="hidden" name="postActualite" value="1">
        <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">ADD</button>
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