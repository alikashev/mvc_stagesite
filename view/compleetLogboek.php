<?php
    $logboekView = new LogboekView();
    $logboekModel = new LogboekModel();

    $userId = 7;
    $stage = $logboekModel->stageinfo_ophalen($userId);

    $visibility = "visible";
    session_start();
    var_dump($_SESSION);
    if(isset($_SESSION["dagId"])) {
        $visibility = "visible";

    }
?>

<style>
    * {
        box-sizing: border-box;
    }

    #logboek {
        background-color: gray;
        border: 1px solid black;
        width: 80%;
        padding: 2px;
    }

    .logboekDag {
        background-color: beige;
        border: 1px solid black;
        height: 65px;
        width: 100%;
        margin-bottom: 2px;
    }

    .logboekDag_dag {
        border: 1px solid red;
        height: 100%;
        width: 10%;
        float: left;

    }

    .logboekDag_beschrijving {
        border: 1px solid red;
        height: 100%;
        width: 60%;
        float: left;
        text-align: left;
        overflow: hidden;
    }

    .logboekDag_urenGewerkt {
        border: 1px solid red;
        height: 100%;
        width: 10%;
        float: left;
        
    }

    .logboekDag_urenIngediend {
        border: 1px solid red;
        height: 100%;
        width: 10%;
        float: left;
        
    }

    .logboekDag_wijzig {
        border: 1px solid red;
        height: 100%;
        width: 10%;
        float: left;
        
    }

    #bewerk_dag {
        height: 400px;
        width: 600px;
        border: 4px solid black;
        background-color: gray;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        visibility: <?php echo $visibility; ?>;
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<form method='post'>
    <div id='logboek'>
        <div id='logboekDagenContainer'>
            <?php $toon_dagen = $logboekView->toon_logboek_dagen($stage->logboek_id); ?>
        </div>
        <a href=''><button>Alle ingevulde uren indienen</button></a>
    </div>  
</form>

<div id="bewerk_dag">
    <div id="header">
        <h3>Bewerk het huidige logboek</h3>
    </div>

    <div id="body">
    <form method="post">
        <input type="hidden" name="dag"></input>
        Beschrijving Werkzaamheden:
        <textarea style="height: 40%; width: 100%;" name="beschrijving"></textarea><br/>
        Aantal uur gewerkt:
        <input type="number" name="uur_gewerkt"></input><br/><br/>
        <input type="submit" name="annuleren" value="Annuleren" onclick="annulerenFunctie();"></input>
        <input type="submit" name="bewerk" value="Opslaan" onclick="opslaanFunctie();"></input>
    </form>
    </div>
</div>

<script>
    function wijzigFunctie() {
        //neem id van de dag mee in url, ook wijzig meenemen in url
    
    }

    function indienFunctie() {
        //neem id van de dag mee in url, ook indien meenemen in url
    }

    function annulerenFunctie() {
        //neem id van de dag mee in url, ook indien meenemen in url
        window.location.href = '../controller/LogboekController.php';
    }

    function opslaanFunctie() {
        
    }
</script>