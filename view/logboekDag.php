<?php
    require_once "model/DataHandler.php";
    // require_once "../model/LogboekModel.php";
    $url = SERVER_URL . "/LogboekController/bewerkDag/$dag->id";

?>

<div id="bewerk_dag">
    <div id="header">
        <h3>Bewerk de huidige dag</h3>
    </div>

    <div id="body">
    <form method="post" action="<?php echo $url;?>">
        Beschrijving Werkzaamheden:
        <textarea style="height: 40%; width: 100%;" name="beschrijving"><?php echo $dag->beschrijving_werkzaamheden?></textarea><br/>
        Aantal uur gewerkt:
        <input type="number" name="uur_gewerkt" value="<?php echo $dag->uur_gewerkt?>" onchange="wijzigNummerFunctie(this.id, this.value);">
        <a href="javascript:loadPage1('<?= SERVER_URL ?>/LogboekController/')">Annuleren</a>
        <input type="submit" name="bewerk" value="Opslaan">
    </form>
    </div>
</div>