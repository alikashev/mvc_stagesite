<?php
    $logboekView = new LogboekView();
    $logboekModel = new LogboekModel();

    $userId = 7;
    $stage = $logboekModel->stageinfo_ophalen($userId);

    $url = $_SERVER['REQUEST_URI'];
    $packets = explode('/',$url);
    $server_url = SERVER_URL;
?>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        padding: 0;
        margin: 0;
    }

    #logboek {
        background-color: gray;
        border: 1px solid black;
        width: 60%;
        padding: 2px;
        float: left;
        margin-top: 15px;
    }

    .logboekDag {
        background-color: beige;
        border: 1px solid black;
        height: 50px;
        width: 100%;
        margin-bottom: 2px;
    }

    .logboekDagExt {
        background-color: beige;
        border: 1px solid black;
        height: 150px;
        width: 100%;
        margin-bottom: 2px;
        display: none;
        /* display: block; */
    }

    .logboekDagExt_beschrijving {
        background-color: beige;
        height: 80%;
        width: 100%;
        float: left;
        resize: none;
    }

    .logboekDagExt_functies {
        height: 20%;
        width: 100%;
        float: left;
        border-top: 1px solid black;
    }

    .logboekDagExt_enkele_functies {
        float: left;
        height: 100%;
        width: 50%;
        text-align: center;
        margin-top: 5px;
    }

    .number_knop {
        border: none;
        text-align: center;
        background-color: beige;
    }

    .indienen_knop {
        color: blue;
    }

    .logboekDag_dag {
        border-right: 1px solid black;
        height: 100%;
        width: 15%;
        float: left;
        padding-top: 14px;
        padding-left: 5px;
    }

    .logboekDag_beschrijving {
        height: 74.1%;
        width: 75%;
        float: left;
        text-align: left;
        overflow: hidden;
        padding-top: 14px;
        padding-left: 5px;
    }

    .logboekDag_urenGewerkt {
        height: 100%;
        width: 7%;
        float: left;
        text-align: right;
        padding-top: 14px;
    }

    #bewerk_dag {
        height: 400px;
        width: 600px;
        border: 4px solid black;
        background-color: gray;
        position: fixed;
        top: 50%;
        left: 50%;
        /* -webkit-transform: translate(-50%, -50%); */
        transform: translate(-50%, -50%);
    }

    #huidigeDag {
        background-color: cyan;
    }

    #indienAlleDagen {
        border: 1px solid black;
        padding: 5px;
    }
</style>

<a id="indienAlleDagen" href="javascript:loadPage1('<?= SERVER_URL ?>/LogboekController/indienAlleDagen/<?= $stage->logboek_id ?>')">Dien alle dagen in met uren</a>

<script src="<?= SERVER_URL ?>/assets/js/main.js"></script>

<form method='post'>
    <div id='logboek'>
        <div id='logboekDagenContainer'>
            <?php $toon_dagen = $logboekView->toon_logboek_dagen($stage->logboek_id); ?>
        </div>
    </div>  
</form>
<!-- <script>
    var my_element = document.getElementById('huidigeDag');
    
    my_element.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
    });
</script> -->
<?php
    // $url = $_SERVER['REQUEST_URI'];
    // $packets = explode('/',$url);

    // if($packets[3] == "bewerkDag") {          
    // } else {
        // echo 
        // "
        //     <script>
        //         var my_element = document.getElementById('huidigeDag');
        
        //         my_element.scrollIntoView({
        //             behavior: 'smooth',
        //             block: 'start',
        //             inline: 'nearest'
        //         });
        //     </script>
        // ";
    // }
?>