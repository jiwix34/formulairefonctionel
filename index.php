<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="./css/main.css"/>
    <title></title>
  </head>
  <body>
    <div class="container">


      <div class="starter-template">

        <?php if(array_key_exists('errors', $_SESSION)): ?>
            <div class="alert alert-danger">
                <?= implode('<br>', $_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
        <?php if(array_key_exists('success', $_SESSION)): ?>
            <div class="alert alert-success">
              Votre email a bien été envoyé
            </div>
        <?php endif; ?>

        <form action="post_contact.php" method="POST">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="inputname">Votre nom</label>
                <input type="text" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="inputprenom">Votre prénom</label>
                <input type="text" name="prenom" class="form-control" id="inputprenom" value="<?= isset($_SESSION['inputs']['prenom']) ? $_SESSION['inputs']['prenom'] : ''; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="inputemail">Votre email</label>
                <input type="text" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="inputobjet">Objet</label>
                <input type="text" name="objet" class="form-control" id="inputobjet" value="<?= isset($_SESSION['inputs']['objet']) ? $_SESSION['inputs']['objet'] : ''; ?>">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form-group ">
                <label for="inputmessage">Votre message</label>
                <textarea id="inputmessage" name="message" class="form-control champMessage"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary test col-xs-2 col-xs-offset-5">Envoyer</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['errors']);
unset($_SESSION['success']);

 ?>
