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
        width: 80%;
        padding: 2px;
        float: left;
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

<form method='post'>
    <div id='logboek'>
        <div id='logboekDagenContainer'>
            <?php $toon_dagen = $logboekView->toon_logboek_dagen($stage->logboek_id); ?>
        </div>
    </div>  
</form>

<script>
    var my_element = document.getElementById('huidigeDag');
    console.log(my_element);
    console.log('test');
    
    my_element.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest'
    });
</script>

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