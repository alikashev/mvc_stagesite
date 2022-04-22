<?php

require_once 'model/User.php';
require_once 'model/Contract.php';
require_once 'model/Company.php';
require_once 'model/Account.php';
require_once 'view/OutputData.php';

class ContractController
{
  public function __construct()
  {
    $this->User = new User();
    $this->Contract = new Contract();
    $this->Company = new Company();
    $this->OutputData = new OutputData();
    $this->Account = new Account();
  }

  public function Index()
  {
    self::readAll();
  }

  public function readAll()
  {
    session_start();
    if ($this->Account->adminCheck()) {
      $contracts = $this->Contract->readAllContracts();
    } else if ($this->Account->supervisorCheck()) {
      $contracts = $this->Contract->readAllContractBySupervisorId($_SESSION["user"]);
    } else if ($this->Account->schoolSupervisorCheck()) {
      $contracts = $this->Contract->readAllContractsBySchoolAccountId($_SESSION["user"]);
    } else {
      header('Location: ' . SERVER_URL . '/Login/');
    }

    $obj = $this->OutputData->createTableContracts($contracts);
    include 'view/home.php';
  }

  public function create()
  {
    session_start();
    $supervisors = $this->User->readAllSupervisors();
    $schoolSupervisor = $this->User->readAllSchoolSupervisors();
    $teachers = $this->User->readAllTeachers();
    $students = $this->User->readAllStudents();
    $parents = $this->User->readAllParents();
    $humanResources = $this->User->readAllHumanResources();
    $schoolAccounts = $this->User->readAllSchoolAccounts();
    $companies = $this->Company->readAllCompanies();

    $selectSupervisor = $this->OutputData->createSupervisorSelectBox($supervisors);
    $selectSchoolSupervisor = $this->OutputData->createSchoolSupervisorSelectBox($schoolSupervisor);
    $selectTeacher = $this->OutputData->createTeacherSelectBox($teachers);
    $selectStudent = $this->OutputData->createStudentSelectBox($students);
    $selectCompany = $this->OutputData->createCompanySelectBox($companies);
    $selectParent = $this->OutputData->createParentSelectBox($parents);
    $selectHR = $this->OutputData->createHumanResourcesSelectBox($humanResources);
    $selectSchoolAccount = $this->OutputData->createSchoolAccountSelectBox($schoolAccounts);


    if ($this->Account->adminCheck()) {
      include 'view/AdminView/create_contract.php';
    } else if ($this->Account->supervisorCheck()) {
      include 'view/AdminView/create_contract.php';
    } else if ($this->Account->schoolSupervisorCheck()) {
      include 'view/AdminView/create_contract.php';
    } else {
      header('Location: ' . SERVER_URL . '/Login/');
    }

    if (isset($_POST["submit"])) {
      $internId = $_POST["internId"];
      $companyId = $_POST["companyId"];
      $mandatoryHours = $_POST["mandatoryHours"];
      $approvedHours = $_POST["approvedHours"];
      $startDate = $_POST["startDate"];
      $endDate = $_POST["endDate"];
      $finished = !empty($_POST["finished"]) ? 1 : 0;
      $supervisorId = !empty($_POST["supervisorId"]) ? $_POST["supervisorId"] : $_SESSION["user"];
      $teacherId = !empty($_POST["teacherId"]) ? $_POST["teacherId"] : $_SESSION["user"];
      $schoolSupervisorId = !empty($_POST["schoolSupervisorId"]) ? $_POST["schoolSupervisorId"] : $_SESSION["user"];
      $parentId = !empty($_POST["parentId"]) ? $_POST["parentId"] : $_SESSION["user"];
      $humanResourcesId = !empty($_POST["humanResourcesId"]) ? $_POST["humanResourcesId"] : $_SESSION["user"];
      $schoolAccountId = !empty($_POST["schoolAccountId"]) ? $_POST["schoolAccountId"] : $_SESSION["user"];
      $this->Contract->addContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $schoolSupervisorId, $parentId, $teacherId, $humanResourcesId, $schoolAccountId);
      header("Location: " . SERVER_URL . "/ContractController/readAll/");
    }
  }
}