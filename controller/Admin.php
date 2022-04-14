<?php

require_once 'model/User.php';
require_once 'model/Contract.php';
require_once 'model/Company.php';
require_once 'view/OutputData.php';

class Admin
{

  public function __construct()
  {

    $this->User = new User();
    $this->Contract = new Contract();
    $this->Company = new Company();
    $this->outputData = new OutputData();
    $fuck = "<br>you";
  }

  public function __destruct()
  {
  }

  public function Index()
  {
    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      var_dump($user);

      if (intval($user[0]['id']) === 1) {
        header("Location: " . SERVER_URL . '/Admin/collectReadAllUsers');
      } else {
        header('Location: ' . SERVER_URL . '/login');
      }
    } else {
      header('Location: ' . SERVER_URL . '/login');
    }
  }

  public function collectAddUser()
  {
    session_start();
    if(!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/create_user.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

    if (isset($_POST["submit"])) {
      $firstName = $_POST["firstName"];
      $infix = $_POST["infix"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"] !== '' ? $_POST["password"] : '';
      $phone = $_POST["phone"];
      $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
      $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
      $isSchoolSupervisor = !empty($_POST["isSchoolSupervisor"]) ? 1 : 0;
      $isSchoolAccount = !empty($_POST["isSchoolAccount"]) ? 1 : 0;
      $isHumanResources = !empty($_POST["isHumanResources"]) ? 1 : 0;
      $isParent = !empty($_POST["isParent"]) ? 1 : 0;
      $school = $_POST["school"];
      $study = $_POST["study"];

      $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $isSchoolSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study);
      header("Location: ../collectReadAllUsers/");
    }
  }

  public function collectAddContract()
  {
    $supervisors = $this->User->readAllSupervisors();
    $schoolSupervisor = $this->User->readAllSchoolSupervisors();
    $teachers = $this->User->readAllTeachers();
    $students = $this->User->readAllStudents();
    $parents = $this->User->readAllParents();
    $humanResources = $this->User->readAllHumanResources();
    $schoolAccounts = $this->User->readAllSchoolAccounts();
    $companies = $this->Company->readAllCompanies();

    $selectSupervisor = $this->outputData->createSupervisorSelectBox($supervisors);
    $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisor);
    $selectTeacher = $this->outputData->createTeacherSelectBox($teachers);
    $selectStudent = $this->outputData->createStudentSelectBox($students);
    $selectCompany = $this->outputData->createCompanySelectBox($companies);
    $selectParents = $this->outputData->createParentSelectBox($parents);
    $selectHR = $this->outputData->createHumanResourcesSelectBox($humanResources);
    $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolAccounts);

    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/create_contract.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }


    if (isset($_POST["submit"])) {
      $internId = $_POST["internId"];
      $companyId = $_POST["companyId"];
      $mandatoryHours = $_POST["mandatoryHours"];
      $approvedHours = $_POST["approvedHours"];
      $startDate = $_POST["startDate"];
      $endDate = $_POST["endDate"];
      $finished = !empty($_POST["finished"]) ? 1 : 0;
      $supervisorId = $_POST["supervisorId"];
      $teacherId = $_POST["teacherId"];
      $schoolSupervisorId = $_POST["schoolSupervisorId"];
      $parentId = $_POST["parentId"];
      $humanResourcesId = $_POST["humanResourcesId"];
      $schoolAccountId = $_POST["schoolAccountId"];
      $this->Contract->addContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $schoolSupervisorId, $parentId, $teacherId, $humanResourcesId, $schoolAccountId);
      header("Location: ../collectReadAllContracts/");
    }
  }

  public function collectAddCompany()
  {
    session_start();

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/create_company.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

    if (isset($_POST["submit"])) {
      $name = $_POST["name"];
      $location = $_POST["location"];
      $url = $_POST["url"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $this->Company->addCompany($name, $location, $url, $email, $phone);
      header("Location: ../collectReadAllCompanies");
    }
  }

  public function collectReadAllUsers()
  {
    session_start();

    $users = $this->User->readAllUsers();
    $obj = $this->outputData->createTableAdminUsers($users);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../login');
    }
  }

  public function collectReadAllContracts()
  {
    $contracts = $this->Contract->readAllContracts();
    $obj = $this->outputData->createTableAdminContracts($contracts);

    session_start();
    if (!empty($_SESSION)) {

      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }

  public function collectReadAllCompanies()
  {
    $companies = $this->Company->readAllCompanies();
    $obj = $this->outputData->createTableAdminCompanies($companies);

    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }

  public function collectReadOneUser($id)
  {
    session_start();
    $user = $this->User->readOneUser($id);
    $obj = $this->outputData->createTable($user);
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }

  public function collectReadOneContract($id)
  {
    session_start();
    $contract = $this->Contract->readOneContract($id);
    $obj = $this->outputData->createTable($contract);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

  }

  public function collectReadOneCompany($id)
  {
    session_start();
    $company = $this->Company->readOneCompany($id);
    $obj = $this->outputData->createTable($company);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['id'] === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }

  public function collectUpdateUser($id)
  {
    session_start();
    $obj = $this->User->readOneUser($id);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/update_user.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

    if (isset($_POST["submit"])) {
      $firstName = $_POST["firstName"];
      $infix = $_POST["infix"];
      $lastName = $_POST["lastName"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $phone = $_POST["phone"];
      $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
      $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
      $isSchoolSupervisor = !empty($_POST["isSchoolSupervisor"]) ? 1 : 0;
      $isSchoolAccount = !empty($_POST["isSchoolAccount"]) ? 1 : 0;
      $isHumanResources = !empty($_POST["isHumanResources"]) ? 1 : 0;
      $isParent = !empty($_POST["isParent"]) ? 1 : 0;

      $school = $_POST["school"];
      $study = $_POST["study"];

      $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSchoolSupervisor, $isSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study);
      header("Location: ../collectReadAllUsers/");
    }
  }


  public function collectUpdateContract($id)
  {
    session_start();
    $supervisors = $this->User->readAllSupervisors();
    $schoolSupervisors = $this->User->readAllSchoolSupervisors();
    $teachers = $this->User->readAllTeachers();
    $students = $this->User->readAllStudents();
    $companies = $this->Company->readAllCompanies();
    $parents = $this->User->readAllParents();
    $hr = $this->User->readAllHumanResources();
    $schoolAccounts = $this->User->readAllSchoolAccounts();

    $obj = $this->Contract->readOneContract($id);

    $selectSupervisor = $this->outputData->createSupervisorSelectBox($supervisors, $obj[0]['praktijkbegeleider_stage_id']);
    $selectTeacher = $this->outputData->createTeacherSelectBox($teachers, $obj[0]['schoolmentor_id']);
    $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisors, $obj[0]['stagebegeleider_id']);
    $selectStudent = $this->outputData->createStudentSelectBox($students, $obj[0]['stagiair_id']);
    $selectCompany = $this->outputData->createCompanySelectBox($companies, $obj[0]['stage_bedrijven_id']);
    $selectParent = $this->outputData->createParentSelectBox($parents, $obj[0]['ouder_id']);
    $selectHR = $this->outputData->createHumanResourcesSelectBox($hr, $obj[0]['vertrouwenspersoon_id']);
    $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolAccounts, $obj[0]['schoolaccount_id']);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/update_contract.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

    if (isset($_POST["submit"])) {
      $internId = $_POST["internId"];
      $companyId = $_POST["companyId"];
      $mandatoryHours = $_POST["mandatoryHours"];
      $approvedHours = $_POST["approvedHours"];
      $startDate = $_POST["startDate"];
      $endDate = $_POST["endDate"];
      $finished = !empty($_POST["finished"]) ? 1 : 0;
      $supervisorId = $_POST["supervisorId"];
      $schoolSupervisorId = $_POST["schoolSupervisorId"];
      $teacherId = $_POST["teacherId"];
      $parentId = $_POST["parentId"];
      $hrId = $_POST["humanResourcesId"];
      $schoolAccountId = $_POST["schoolAccountId"];

      $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $schoolSupervisorId, $parentId, $hrId, $schoolAccountId);
      header("Location: ../collectReadAllContracts/");
    }
  }

  public function collectUpdateCompany($id)
  {
    session_start();
    $obj = $this->Company->readOneCompany($id);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        include 'view/AdminView/update_company.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
    if (isset($_POST["submit"])) {
      $name = $_POST["name"];
      $location = $_POST["location"];
      $url = $_POST["url"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];

      $this->Company->updateCompany($id, $name, $location, $url, $email, $phone);
      header("Location: ../collectReadAllCompanies");
    }
  }

  public function collectDeleteContract($id)
  {
    session_start();

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        $obj = $this->Contract->deleteContract($id);
        header("Location: ../collectReadAllContracts/");
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

  }

  public function collectDeleteCompany($id)
  {
    session_start();

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if (intval($user[0]['id']) === 1) {
        $obj = $this->Company->deleteCompany($id);
        header("Location: ../collectReadAllCompanies");
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }
}

?>