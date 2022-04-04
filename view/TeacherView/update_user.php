<?php
$obj = $obj[0];
?>
<form method="post">
  First name: <input name="firstName" value="<?=$obj['voornaam']?>">
  <br>
  <br>
  Infix: <input name="infix" value="<?=$obj['tussenvoegsel']?>">
  <br>
  <br>
  Last name: <input name="lastName" value="<?=$obj['achternaam']?>">
  <br>
  <br>
  Email: <input type="email" name="email" value="<?=$obj['email']?>">
  <br>
  <br>
  Password: <input type="password" name="password">
  <br>
  <br>
  Phone: <input type="tel" name="phone" value="<?=$obj['telefoonnummer']?>">
  <br>
  <br>
  School: <input name="school" value="<?=$obj['schoolnaam']?>">
  <br>
  <br>
  Study: <input name="study" value="<?=$obj['studie']?>">
  <br>
  <br>
    Is ouder: <input name="isParent" id="isParent" type="checkbox" <?= $obj['is_ouder'] ? 'checked' : '' ?>>
  <input value="Submit" type="submit" name="submit">
</form>