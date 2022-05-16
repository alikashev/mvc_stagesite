<?php

require_once 'model/User.php';
require_once 'model/Contract.php';
require_once 'model/Company.php';
require_once 'view/OutputData.php';

class School
{

  public function __construct()
  {

    $this->User = new User();
    $this->Contract = new Contract();
    $this->Company = new Company();
    $this->outputData = new OutputData();
  }

  public function __destruct()
  {
  }

  public function Index()
  {
    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_schoolaccount'] === 1) {
        var_dump($user);
        header('Location: ' . SERVER_URL . '/School/collectReadAllUsers');
      } else {
        header('Location: ' . SERVER_URL . '/login');
      }
    } else {
      header('Location: ' . SERVER_URL . '/login');
    }
  }

  public function collectReadAllUsers()
  {
    session_start();


    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      $users = $this->User->readAllBySchoolName($user[0]['id']);
      $obj = $this->outputData->createTableSchoolUsers($users);

      if ($user[0]['is_schoolaccount'] === 1) {
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
    session_start();
    if (!empty($_SESSION)) {

      $user = $this->User->readOneUser($_SESSION["user"]);

      $contracts = $this->Contract->readAllContractsBySchoolAccountId($user[0]['id']);
      $obj = $this->outputData->createTableSchoolContracts($contracts);

      if ($user[0]['is_schoolaccount'] === 1) {
        include 'view/home.php';
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }
  }

  public function collectAddUser()
  {
    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_schoolaccount'] === 1) {
        include 'view/SchoolView/create_user.php';
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
      $isSupervisor = 0;
      $isSchoolSupervisor = !empty($_POST["isSchoolSupervisor"]);
      $isSchoolAccount = 0;
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
    $schoolaccount = $this->User->readAllSchoolAccounts();
    $humanresources = $this->User->readAllHumanResources();
    $supervisors = $this->User->readAllSupervisors();
    $schoolSupervisor = $this->User->readAllSchoolSupervisors();
    $teachers = $this->User->readAllTeachers();
    $students = $this->User->readAllStudents();
    $parents = $this->User->readAllParents();

    $companies = $this->Company->readAllCompanies();

    $selectSupervisor = $this->outputData->createSupervisorSelectBox($supervisors);
    $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisor);
    $selectTeacher = $this->outputData->createTeacherSelectBox($teachers);
    $selectStudent = $this->outputData->createStudentSelectBox($students);
    $selectCompany = $this->outputData->createCompanySelectBox($companies);
    $selectParent = $this->outputData->createParentSelectBox($parents);
    $selectHR = $this->outputData->createHumanResourcesSelectBox($humanresources);
    $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolaccount);

    session_start();
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      if ($user[0]['is_stagebegeleider'] === 1) {
        include 'view/SchoolView/create_contract.php';
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
      $schoolSupervisorId = $user[0]['id'];
      $parentId = $_POST["parentId"];
      $schoolaccountId = $_POST["schoolAccountId"];
      $humanResourcesId = $_POST["humanResourcesId"];

      $this->Contract->addContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $schoolSupervisorId, $parentId, $teacherId, $humanResourcesId, $schoolaccountId);
      header("Location: ../collectReadAllContracts/");
    }
  }

  public function collectReadOneUser($id)
  {
    session_start();
    $user = $this->User->readOneUser($id);
    $obj = $this->outputData->createTable($user);
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_schoolaccount'] === 1) {
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

      if ($user[0]['is_schoolaccount'] === 1) {
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

      if ($user[0]['is_schoolmentor'] === 1) {
        include 'view/SchoolView/update_user.php';
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
      $isSupervisor = $obj['is_praktijkbegeleider'];
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
    $schoolSupervisors = $this->User->readAllSchoolSupervisors();
    $teachers = $this->User->readAllTeachers();
    $students = $this->User->readAllStudents();
    $companies = $this->Company->readAllCompanies();
    $parents = $this->User->readAllParents();
    $humanresources = $this->User->readAllHumanResources();
    $schoolaccounts = $this->User->readAllSchoolAccounts();

    $obj = $this->Contract->readOneContract($id);

    $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisors, $obj[0]['stagebegeleider_id']);
    $selectTeacher = $this->outputData->createTeacherSelectBox($teachers, $obj[0]['schoolmentor_id']);
    $selectStudent = $this->outputData->createStudentSelectBox($students, $obj[0]['stagiair_id']);
    $selectCompany = $this->outputData->createCompanySelectBox($companies, $obj[0]['stage_bedrijven_id']);
    $selectParent = $this->outputData->createParentSelectBox($parents, $obj[0]['ouder_id']);
    $selectHumanResources = $this->outputData->createHumanResourcesSelectBox($humanresources, $obj[0]['vertrouwenspersoon_id']);
    $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolaccounts, $obj[0]['schoolaccount_id']);

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_schoolmentor'] === 1) {
        include 'view/SchoolView/update_contract.php';
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
      $schoolSupervisorId = $_POST["schoolSupervisorId"];
      $teacherId = $_POST["teacherId"];
      $parentId = $_POST["parentId"];
      $supervisorId = $obj['praktijkbegeleider_stage_id'];

      $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $schoolSupervisorId, $parentId);
      header("Location: ../collectReadAllContracts/");
    }
  }

  public function collectDeleteContract($id)
  {
    session_start();

    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);

      if ($user[0]['is_schoolaccount'] === 1) {
        $obj = $this->Contract->deleteContract($id);
        header("Location: ../collectReadAllContracts/");
      } else {
        header('Location: ../../login');
      }
    } else {
      header('Location: ../../login');
    }

  }
}

?>