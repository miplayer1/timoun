<?php

  if (!empty($_POST['login']) && !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    foreach ($usersList as $user) {
      if ($user['login'] == $login && $user['pass']== $pass) {
        header('location:admin.php');
      }else {
        $msg = 'Accès refusé';
      }
    }
  }

?>

<div class="login">
   <form method="post" action="">
     <input type="text" placeholder="Login" name="login" required/>
     <input type="password" placeholder="Mot de passe" name="pass" required/>
     <input type="submit" value="Login"/>
   </form>
</div>
<div class="feedback">
  <?php echo $msg; ?>
</div>
