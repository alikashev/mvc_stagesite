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
  Is teacher: <input type="checkbox" name="isTeacher" <?=$obj['is_docent'] === 1 ? 'checked' : ''?>>
  <br>
  <br>
  Is supervisor: <input type="checkbox" name="isSupervisor" <?=$obj['is_persoon_stage'] === 1 ? 'checked' : ''?>>
  <br>
  <br>
  School: <input name="school" value="<?=$obj['schoolnaam']?>">
  <br>
  <br>
  Study: <input name="study" value="<?=$obj['studie']?>">
  <br>
  <br>
  <input value="Submit" type="submit" name="submit">
</form>