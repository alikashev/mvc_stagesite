<?php

require_once 'model/DataHandler.php';
require_once 'model/Main.php';
require_once 'view/OutputData.php';

class Company extends Main
{

  public function __construct()
  {
    parent::__construct();
  }

  public function __destruct()
  {
  }

  public function readAllCompanies()
  {

    try {

      $query = "SELECT * FROM stage_bedrijven";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;

    } catch (PDOException $e) {

      echo "Fout opgetreden";
      return false;
    }

  }

  public function readOneCompany($id)
  {
    try {
      $query = "SELECT * FROM stage_bedrijven";
      $query .= " WHERE id = '$id'";
      $result = $this->datahandler->readsData($query);
      $results = $result->fetchAll();

      return $results;
    } catch (PDOException $e) {
      echo "Fout opgetreden: $e";
      return false;
    }
  }

  public function addCompany($name, $location, $url, $email, $phone)
  {
    try {
      $query = "INSERT INTO stage_bedrijven (naam, locatie, url_website, email, telefoonnummer) VALUES ('$name', '$location', '$url', '$email', '$phone')";
      $this->datahandler->createData($query);

      return true;
    } catch (PDOException $e) {
      echo "Fout opgetreden: $e";
      return false;
    }
  }

  public function updateCompany($id, $name, $location, $url, $email, $phone)
  {
    try {
      $query = "UPDATE stage_bedrijven SET naam = '$name', locatie = '$location', url_website = '$url', email = '$email', telefoonnummer = '$phone'";
      $query .= " WHERE id = '$id'";
      var_dump($query);
      $this->datahandler->updateData($query);

      return true;
    } catch (PDOException $e) {
      echo "Fout opgetreden: $e";
      return false;
    }
  }

  public function deleteCompany($id)
  {
    try {
      $query = "DELETE FROM stage_bedrijven";
      $query .= " WHERE id = '$id'";
      $this->datahandler->deleteData($query);

      return true;
    } catch (PDOException $e) {
      echo "Fout opgetreden: $e";
      return false;
    }
  }
}

?>