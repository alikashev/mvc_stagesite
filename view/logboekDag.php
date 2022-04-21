<?php
    require_once "../model/DataHandler.php";

    if(!isset($_GET["dagId"])) {
        header("location: ../controller/LogboekController");
    }
        
    $logboekId = $_GET["dagId"];
    $datahandler = new datahandler("localhost", "mysql", "stagesite","root", "");
    var_dump($logboekId);

    $query = "SELECT * FROM logboek_dagen WHERE id = $logboekId";
    $result = $datahandler->readsData($query);
    $dag = $result->fetchObject();

    var_dump($dag);

    if($_POST["annuleren"]) {
        header("location: ../controller/LogboekController");
    }

    if($_POST["bewerk"]) {
        
    }
?>

<div id="bewerk_dag">
    <div id="header">
        <h3>Bewerk de huidige dag</h3>
    </div>

    <div id="body">
    <form method="post">
        <input type="hidden" name="dag"></input>
        Beschrijving Werkzaamheden:
        <textarea style="height: 40%; width: 100%;" name="beschrijving"><?php echo $dag->beschrijving_werkzaamheden?></textarea><br/>
        Aantal uur gewerkt:
        <input type="number" name="uur_gewerkt" value="<?php echo $dag->uur_gewerkt?>"></input><br/><br/>
        <input type="submit" name="annuleren" value="Annuleren" onclick="annulerenFunctie();"></input>
        <input type="submit" name="bewerk" value="Opslaan" onclick="opslaanFunctie();"></input>
    </form>
    </div>
</div>