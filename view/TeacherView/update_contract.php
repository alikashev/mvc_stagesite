<?php
$obj = $obj[0];
?>
<form method="post">
  Stagiair id: <input name="internId" value="<?=$obj['stagiair_id']?>">
  <br>
  <br>
  Stagebedrijf id: <input name="companyId" value="<?=$obj['stage_bedrijven_id']?>">
  <br>
  <br>
  Benodigde aantal uren: <input type="number" name="mandatoryHours" value="<?=$obj['aantal_uren_nodig']?>">
  <br>
  <br>
  Goedgekeurde uren: <input type="number" name="approvedHours" value="<?=$obj['aantal_uren_goedgekeurd']?>">
  <br>
  <br>
  Startdatum: <input type="date" name="startDate" value="<?=$obj['start_datum']?>">
  <br>
  <br>
  Eindatum: <input type="date" name="endDate" value="<?=$obj['eind_datum']?>">
  <br>
  <br>
  Is afgerond: <input type="checkbox" name="finished" <?=$obj['is_afgerond'] !== 0 ? 'checked' : ''?>>
  <br>
  <br>
  Stagebegeleider id: <?=$obj2?>
  <br>
  <br> 
  Logboek id: <input name="logId" value="<?=$obj['logboek_id']?>">
  <br>
  <br>
  <input value="Submit" type="submit" name="submit">
</form>