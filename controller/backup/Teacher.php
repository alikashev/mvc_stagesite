<?php

require_once 'model/User.php';
require_once 'model/Contract.php';
require_once 'model/Company.php';
require_once 'view/OutputData.php';

class Teacher {

    public function __construct(){

        $this->User = new User();
        $this->Contract = new Contract();
        $this->Company = new Company();
        $this->outputData = new OutputData();
        $this->id = 1;
    }

    public function __destruct(){}

    public function Index() {
        header("Location: collectReadAllUsers");
    }

    public function collectAddUser() {
      session_start();
      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if (intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/TeacherView/create_user.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
      if (isset($_POST["submit"]))
        {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"] !== '' ? $_POST["password"] : '';
            $phone = $_POST["phone"];
            $isTeacher = 0;
            $isSupervisor = 0;
            $isSchoolSupervisor = 0;
            $isHumanResources = 0;
            $isParent = $_POST["isParent"];
            $isSchoolAccount = 0;
            $school = $_POST["school"];
            $study = $_POST["study"];
            $userId = $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $isSchoolSupervisor, $isHumanResources, $isParent, $isSchoolAccount, $school, $study);
            header("Location: ../collectReadAllUsers/");
        }
    }

    public function collectAddContract() {
      session_start();

        $supervisors = $this->User->readAllSupervisors();
        $schoolSupervisors = $this->User->readAllSchoolSupervisors();
        $students = $this->User->readAllStudents();
        $companies = $this->Company->readAllCompanies();
        $parents = $this->User->readAllParents();
        $hr = $this->User->readAllHumanResources();
        $schoolAccounts = $this->User->readAllSchoolAccounts();
        $teachers = $this->User->readAllTeachers();

        $obj = $this->outputData->createSupervisorSelectBox($supervisors);
        $obj2 = $this->outputData->createStudentSelectBox($students);
        $obj3 = $this->outputData->createCompanySelectBox($companies);
        $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisors);
        $selectParent = $this->outputData->createParentSelectBox($parents);
        $selectHumanResources = $this->outputData->createHumanResourcesSelectBox($hr);
        $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolAccounts);
        $selectTeacher = $this->outputData->createTeacherSelectBox($teachers);

        if (isset($_SESSION)) {
          if (isset($_SESSION["user"])) {
            $user = $this->User->readOneUser($_SESSION["user"]);
            if(intval($user[0]['is_schoolmentor']) === 1) {
              include 'view/TeacherView/create_contract.php';
            } else {
              header('Location: ' . SERVER_URL . '/Login/');
            }
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        }

        if(isset($_POST["submit"])) {
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

    public function collectReadAllUsers() {
      session_start();

      $teacherId = $this->id;
      $users = $this->User->readAllUsersByTeacher($teacherId);
      $obj = $this->outputData->createTableTeacherUsers($users);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/home.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
    }

    public function collectReadAllContracts() {
      session_start();

        $teacherId = $this->id;
        $contracts = $this->Contract->readAllContractsByTeacherId($teacherId);
        $obj = $this->outputData->createTableTeacherContracts($contracts);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/home.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
    }

    public function collectReadOneUser($id) {
      session_start();

        $user = $this->User->readOneUser($id);
        $obj = $this->outputData->createTable($user);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/home.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
    }

    public function collectReadOneContract($id) {
      session_start();

        $contract = $this->Contract->readOneContract($id);
        $obj = $this->outputData->createTable($contract);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/home.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
    }

    public function collectUpdateUser($id) {
      session_start();

        $obj = $this->User->readOneUser($id);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/TeacherView/update_user.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
        if(isset($_POST["submit"])) {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $isTeacher = $obj[0]['is_schoolmentor'];
            $isSupervisor = $obj[0]['is_praktijkbegeleider'];
            $isSchoolSupervisor = $obj[0]['is_stagebegeleider'];
            $isSchoolAccount = $obj[0]['is_schoolaccount'];
            $isHumanResources = $obj[0]['is_vertrouwenspersoon'];
            $isParent = $_POST["isParent"];
            $school = $_POST["school"];
            $study = $_POST["study"];

            $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSchoolSupervisor, $isSupervisor, $isSchoolAccount, $isHumanResources, $isParent, $school, $study);
            header("Location: ../collectReadAllUsers/");
        }
    }


    public function collectUpdateContract($id) {
      session_start();

        $supervisors = $this->User->readAllSupervisors();
        $schoolSupervisors = $this->User->readAllSchoolSupervisors();
        $students = $this->User->readAllStudents();
        $companies = $this->Company->readAllCompanies();
        $teachers = $this->User->readAllTeachers();
        $schoolAccounts = $this->User->readAllSchoolAccounts();
        $humanResources = $this->User->readAllHumanResources();
        $parents = $this->User->readAllParents();

        $obj = $this->Contract->readOneContract($id);

        $selectSupervisor = $this->outputData->createSupervisorSelectBox($supervisors, $obj[0]['praktijkbegeleider_stage_id']);
        $selectStudent = $this->outputData->createStudentSelectBox($students, $obj[0]['stagiair_id']);
        $selectCompany = $this->outputData->createCompanySelectBox($companies, $obj[0]['stage_bedrijven_id']);
        $selectTeacher = $this->outputData->createTeacherSelectBox($teachers, $obj[0]['schoolmentor_id']);
        $selectSchoolSupervisor = $this->outputData->createSchoolSupervisorSelectBox($schoolSupervisors, $obj[0]['stagebegeleider_id']);
        $selectSchoolAccount = $this->outputData->createSchoolAccountSelectBox($schoolAccounts, $obj[0]['schoolaccount_id']);
        $selectHumanResources = $this->outputData->createHumanResourcesSelectBox($humanResources, $obj[0]['vertrouwenspersoon_id']);
        $selectParent = $this->outputData->createParentSelectBox($parents, $obj[0]['ouder_id']);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            include 'view/TeacherView/update_contract.php';
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }

        if(isset($_POST["submit"])) {
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
            $humanResourcesId = $_POST["humanResourcesId"];
            $schoolAccountId = $_POST["schoolAccountId"];

            $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $schoolSupervisorId, $parentId, $humanResourcesId, $schoolAccountId);
            header("Location: ../collectReadAllContracts/");
        }
    }

    public function collectDeleteContract($id)
    {
      session_start();

        $obj = $this->Contract->deleteContract($id);

      if (isset($_SESSION)) {
        if (isset($_SESSION["user"])) {
          $user = $this->User->readOneUser($_SESSION["user"]);
          if(intval($user[0]['is_schoolmentor']) === 1) {
            header("Location: ../collectReadAllContracts/");
          } else {
            header('Location: ' . SERVER_URL . '/Login/');
          }
        } else {
          header('Location: ' . SERVER_URL . '/Login/');
        }
      }
    }
}

?>