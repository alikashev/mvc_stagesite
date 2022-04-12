<?php
$obj = $obj[0];
?>
<style>
    .inputs {
        margin: 1rem 0;
    }
</style>
<form method="post">
<div class="inputs">
    <label for="name">Naam: </label>
    <input type="text" name="name" id="name" value="<?= $obj['naam'] !== '' ? $obj['naam'] : ''?>">
</div>

<div class="inputs">
    <label for="location">Locatie: </label>
    <input type="text" name="location" id="location" value="<?= $obj['locatie'] !== '' ? $obj['locatie'] : '' ?>">
</div>

<div class="inputs">
    <label for="url">Url/Website: </label>
    <input type="text" name="url" id="url" value="<?= $obj['url_website'] !== '' ? $obj['url_website'] : '' ?>">
</div>

<div class="inputs">
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value="<?= $obj['email'] !== '' ? $obj['email'] : '' ?>">
</div>

<div class="inputs">
    <label for="phone">Telefoonnummer: </label>
    <input type="tel" name="phone" id="phone" value="<?= $obj['telefoonnummer'] !== '' ? $obj['telefoonnummer'] : '' ?>">
</div>

<input type="submit" name="submit" value="Verzenden">
</form>