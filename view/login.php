<style>
  .divider {
    margin-bottom: 1rem;
  }
</style>
<form method="post" action="<?= SERVER_URL . '/Login/checkLogin/'?>">
  <label for="email"></label>
  <input name="email" type="email" id="email">
  <div class="divider"></div>
  <label for="password"></label>
  <input name="password" type="password" id="password">
  <div class="divider"></div>
  <input type="submit" name="submit" value="Inloggen">
</form>