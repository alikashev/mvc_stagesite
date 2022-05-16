<style>
  .inputs {
    margin-bottom: 1rem;
  }
</style>
<form method="post" action="<?= SERVER_URL . '/Register/registerUser/'?>">
    <div class="inputs first_name">
        <label for="firstName">Voornaam:</label>
        <input name="firstName" type="text" id="firstName">
    </div>
    <div class="inputs infix">
        <label for="infix">Tussenvoegsel:</label>
        <input name="infix" type="text" id="infix">
    </div>
    <div class="inputs last_name">
        <label for="lastName">Achternaam:</label>
        <input name="lastName" type="text" id="lastName">
    </div>
    <div class="inputs password">
        <label for="password">Password:</label>
        <input required name="password" type="password" id="password">
    </div>
    <div class="inputs email">
        <label for="email">Email:</label>
        <input required type="email" name="email" id="email">
    </div>
    <div class="inputs phone">
        <label for="phone">Telefoonnummer:</label>
        <input type="tel" name="phone" id="phone">
    </div>
    <div class="inputs school">
        <label for="school">School:</label>
        <input type="text" name="school" id="school">
    </div>
    <div class="inputs study">
        <label for="study">Studie:</label>
        <input type="text" name="study" id="study">
    </div>
    <input type="submit" name="submit" value="Submit">
</form>