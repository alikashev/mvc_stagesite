<?php

require_once 'model/DataHandler.php';
require_once 'model/Main.php';
require_once 'view/OutputData.php';

class Contract extends Main
{

  public function __construct()
  {
    parent::__construct();
  }

  public function __destruct()
  {
  }

  public function AddContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $schoolSupervisorId, $parentId, $teacherId, $humanResourcesId, $schoolAccountId)
  {

    try {
      $query = "INSERT INTO logboek (aantal_uren, aantal_uren_ingediend)";
      $query .= " VALUES ('0', '0');";
      $this->datahandler->createData($query);
      $logId = $this->datahandler->lastInsertId();
      $query = "INSERT INTO stages (stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, schoolmentor_id, praktijkbegeleider_stage_id, ouder_id, vertrouwenspersoon_id, schoolaccount_id, logboek_id)";
      $query .= " VALUES ('$internId', '$companyId', '$mandatoryHours', '$approvedHours', '$startDate', '$endDate', '$finished', '$schoolSupervisorId', '$teacherId', '$supervisorId', '$parentId', '$humanResourcesId', '$schoolAccountId', '$logId');";
      $result = $this->datahandler->createData($query);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }

  }

  public function readAllContracts()
  {

    try {

      $query = "SELECT id, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond FROM stages";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }

  }

  public function readAllContractBySupervisorId($id)
  {
    try {
      $query = "SELECT id, stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, praktijkbegeleider_stage_id, schoolmentor_id, ouder_id, logboek_id from stages ";
      $query .= "WHERE praktijkbegeleider_stage_id = '$id'";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {
      echo "Fout opgetreden: " . $e;
    }
  }

    public function readAllContractBySchoolSupervisorId($id)
    {
        try {
            $query = "SELECT id, stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, praktijkbegeleider_stage_id, schoolmentor_id, ouder_id, logboek_id from stages ";
            $query .= "WHERE stagebegeleider_id = '$id'";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $results;

        } catch (PDOException $e) {
            echo "Fout opgetreden: " . $e;
        }
    }

  public function readAllContractsByTeacherId($id)
  {
    try {
      $query = "SELECT id, stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, praktijkbegeleider_stage_id, schoolmentor_id, schoolaccount_id, vertrouwenspersoon_id, ouder_id, logboek_id from stages ";
      $query .= "WHERE schoolmentor_id = '$id'";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {
      echo "Fout opgetreden: " . $e;
    }
  }

  public function readAllContractsBySchoolAccountId($id)
  {
    try {
      $query = "SELECT schoolnaam FROM gebruikers WHERE id = '$id'";
      $result = $this->datahandler->readsData($query);
      var_dump($query);
      $results = $result->fetchAll();

      $schoolname = $results[0]['schoolnaam'];

      $query = "SELECT id FROM gebruikers WHERE schoolnaam = '$schoolname' AND is_schoolaccount = 1";
      var_dump($query);
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      $schoolAccountId = $results[0]['id'];

      $query = "SELECT id, stagiair_id, stage_bedrijven_id, aantal_uren_nodig, aantal_uren_goedgekeurd, start_datum, eind_datum, is_afgerond, stagebegeleider_id, praktijkbegeleider_stage_id, schoolmentor_id, schoolaccount_id, vertrouwenspersoon_id, ouder_id, logboek_id from stages";
      $query .= "WHERE schoolaccount_id = '$schoolAccountId'";
      var_dump($query); die;
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {
      echo "Fout opgetreden: " . $e;
    }
  }

  public function readOneContract($id)
  {

    try {

      $query = "SELECT * FROM stages ";
      $query .= "WHERE id = $id";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

  public function deleteContract($id)
  {

    try {

      $query = "DELETE FROM stages ";
      $query .= "WHERE id = $id ";
      $result = $this->datahandler->deleteData($query);

    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

  public function updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $schoolSupervisorId, $parentId, $humanResourcesId, $schoolAccountId)
  {

    try {
      $query = "UPDATE stages SET stagiair_id = '$internId', stage_bedrijven_id = '$companyId', aantal_uren_nodig = '$mandatoryHours', aantal_uren_goedgekeurd = '$approvedHours', start_datum = '$startDate', eind_datum = '$endDate', is_afgerond = '$finished', stagebegeleider_id = '$schoolSupervisorId', schoolmentor_id = '$teacherId', praktijkbegeleider_stage_id = '$supervisorId', ouder_id = '$parentId', vertrouwenspersoon_id = '$humanResourcesId', schoolaccount_id = '$schoolAccountId'";
      $query .= " WHERE id = $id";
      $result = $this->datahandler->updateData($query);
    } catch (PDOException $e) {

      echo "Fout opgetreden";

    }
  }

}

?>