<?php
    $logboekView = new LogboekView();
    $logboekModel = new LogboekModel();

    $userId = 7;
    $stage = $logboekModel->stageinfo_ophalen($userId);
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
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<form method='post'>
    <div id='logboek'>
        <div id='logboekDagenContainer'>
            <?php $toon_dagen = $logboekView->toon_logboek_dagen($stage->logboek_id); ?>
        </div>
    </div>  
</form>