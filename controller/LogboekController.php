<?php
ob_start();
require_once 'model/LogboekModel.php';
require_once 'view/LogboekView.php';
require_once "view/compleetLogboek.php";

class LogboekController
{
    public function __construct()
    {
        $this->Logboek = new LogboekModel();
    }

    public function __destruct()
    {
    }

    public function Index()
    {
        self::toonLogboek();
    }

    public function toonLogboek()
    {
        $logboekModel = new LogboekModel();
        $logboekView = new LogboekView();

        $userId = 7;
        $stage = $logboekModel->stageinfo_ophalen($userId);
    }

    public function bewerkDag($id, $test)
    {
        self::toonLogboek();
        $dag = $this->Logboek->logboekDag_ophalen($id);
        var_dump($dag);

        $beschrijving = $_POST["beschrijving"];
        $uurGewerkt = $_POST["uur_gewerkt"];
        var_dump($_POST);

        var_dump($test); die;

        $this->Logboek->bewerkDag($id, $beschrijving, $uurGewerkt);

        session_start();
        $_SESSION["is_bewerkt"] = 1;

        $url2 = SERVER_URL . "/Home/";
        header("location: $url2");
    }

    public function wijzigNummer($dagId, $nummer)
    {
        $dag = $this->Logboek->logboekDag_ophalen($dagId);
        $this->Logboek->bewerkDag($dagId, $dag->beschrijving_werkzaamheden, $nummer);
    }

    function indienDag($id)
    {
        //bewerkt de dag met het meegegeven id
        $this->Logboek->indienDag($id);
    }

    function indienDagen($id)
    {
        //bewerkt de dag met het meegegeven id
        $id = (int)$id;
        $id2 = $id - 7;
        $ids = array();

        while ($id > $id2) {
            $dag = $this->Logboek->logboekDag_ophalen($id);
            if ($dag->uur_gewerkt) {
                array_push($ids, $id);
            }
            $id--;
        }
        $this->Logboek->indienDagen($ids);
        header("location: ../../LogboekController");
    }

    function indienAlleDagen($logboekId)
    {
        //bewerkt alle dagen met ingevulde uren
        $this->Logboek->indienAlleDagen($logboekId);
        header("location: ../../LogboekController");
    }
}

?>