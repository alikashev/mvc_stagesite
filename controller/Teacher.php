<?php

require_once 'Model/User.php';
require_once 'Model/Contract.php';
require_once 'Model/Company.php';
require_once 'View/outputData.php';

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
        include 'view/TeacherView/create_user.php';
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
            $school = $_POST["school"];
            $study = $_POST["study"];

            $teacherId = $this->id;
            $userId = $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            $this->Contract->addContract($userId, 1, 680, 0, '2022-03-22', '2022-03-23', 0, $teacherId, $teacherId);
            header("Location: ../collectReadAllUsers/");
        }
    }

    public function collectAddContract() {
        $supervisors = $this->User->readAllSupervisors();
        $students = $this->User->readAllStudents();
        $companies = $this->Company->readAllCompanies();
        $obj = $this->outputData->createSupervisorSelectBox($supervisors);
        $obj2 = $this->outputData->createStudentSelectBox($students);
        $obj3 = $this->outputData->createCompanySelectBox($companies);

        include 'view/TeacherView/create_contract.php';
        if(isset($_POST["submit"])) {
            $internId = $_POST["internId"];
            $companyId = $_POST["companyId"];
            $mandatoryHours = $_POST["mandatoryHours"];
            $approvedHours = $_POST["approvedHours"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $finished = !empty($_POST["finished"]) ? 1 : 0;
            $supervisorId = $_POST["supervisorId"];
            $teacherId = $this->id;

            $this->Contract->addContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId);
            header("Location: ../collectReadAllContracts/");
        }
    }

    public function collectReadAllUsers() {
        $teacherId = $this->id;
        $users = $this->User->readAllUsersByTeacher($teacherId);
        $obj = $this->outputData->createTableTeacherUsers($users);
        include 'view/home.php';
    }

    public function collectReadAllContracts() {
        $teacherId = $this->id;
        $contracts = $this->Contract->readAllContractsByTeacherId($teacherId);
        $obj = $this->outputData->createTableTeacherContracts($contracts);
        include 'view/home.php';
    }

    public function collectReadOneUser($id) {
        $user = $this->User->readOneUser($id);
        $obj = $this->outputData->createTable($user);
        include 'view/home.php';
    }

    public function collectReadOneContract($id) {
        $contract = $this->Contract->readOneContract($id);
        $obj = $this->outputData->createTable($contract);
        include 'view/home.php';
    }

    public function collectUpdateUser($id) {
        $obj = $this->User->readOneUser($id);
        include 'view/TeacherView/update_user.php';
        if(isset($_POST["submit"])) {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $isTeacher = 0;
            $isSupervisor = 0;
            $school = $_POST["school"];
            $study = $_POST["study"];

            $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            header("Location: ../collectReadAllUsers/");
        }
    }


    public function collectUpdateContract($id) {
        $supervisors = $this->User->readAllSupervisors();
        $students = $this->User->readAllStudents();
        $companies = $this->Company->readAllCompanies();
        $teacherId = $this->id;
        $obj = $this->Contract->readOneContract($id);
        $selectSupervisor = $this->outputData->createSupervisorSelectBox($supervisors, $obj[0]['praktijkbegeleider_stage_id']);
        $selectStudent = $this->outputData->createStudentSelectBox($students, $obj[0]['stagiair_id']);
        $selectCompany = $this->outputData->createCompanySelectBox($companies, $obj[0]['stage_bedrijven_id']);

        include 'view/TeacherView/update_contract.php';
        if(isset($_POST["submit"])) {
            $internId = $_POST["internId"];
            $companyId = $_POST["companyId"];
            $mandatoryHours = $_POST["mandatoryHours"];
            $approvedHours = $_POST["approvedHours"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $finished = !empty($_POST["finished"]) ? 1 : 0;
            $supervisorId = $_POST["supervisorId"];
            $teacherId = $teacherId;

            $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId);
            header("Location: ../collectReadAllContracts/");
        }
    }

    // public function collectDeleteUser($id) {
    //     $obj = $this->User->deleteUser($id);
    //     include 'view/succes.php';
    // }

    public function collectDeleteContract($id)
    {
        $obj = $this->Contract->deleteContract($id);
        header("Location: ../collectReadAllContracts/");
    }
}

?>