<?php
// Créer des fichiers et une arborescence

require_once(VIEWS .'/includes/header.php');


?>

<div class="wrapper">
  <div id="formContent">

    <!-- Login Form -->
    <form method="post" action="<?php echo HOST ?>/login" accept-charset="UTF-8">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required>
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

  </div>
</div> 


<?php

require_once(VIEWS .'/includes/footer.php');


?>