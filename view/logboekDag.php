<?php
    require_once "model/DataHandler.php";
    // require_once "../model/LogboekModel.php";
?>

<div id="bewerk_dag">
    <div id="header">
        <h3>Bewerk de huidige dag</h3>
    </div>

    <div id="body">
    <form method="post">
        Beschrijving Werkzaamheden:
        <textarea style="height: 40%; width: 100%;" name="beschrijving"><?php echo $dag->beschrijving_werkzaamheden?></textarea><br/>
        Aantal uur gewerkt:
        <input type="number" name="uur_gewerkt" value="<?php echo $dag->uur_gewerkt?>"></input><br/><br/>
        <input type="submit" name="annuleren" value="Annuleren" onclick="annulerenFunctie();"></input>
        <input type="submit" name="bewerk" value="Opslaan" onclick="opslaanFunctie();"></input>
    </form>
    </div>
</div>