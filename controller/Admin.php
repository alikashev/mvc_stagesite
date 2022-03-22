<?php

require_once 'Model/User.php';
require_once 'Model/Contract.php';
require_once 'View/outputData.php';

class Admin {

    public function __construct(){

        $this->User = new User();
        $this->Contract = new Contract();
        $this->outputData = new OutputData();
    }

    public function __destruct(){}

    public function Default() {
        header("Location: collectReadAllUsers");
    }

    public function collectAddUser() {
        include 'view/AdminView/create_user.php';
        if (isset($_POST["submit"]))
        {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"] !== '' ? $_POST["password"] : '';
            $phone = $_POST["phone"];
            $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
            $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
            $school = $_POST["school"];
            $study = $_POST["study"];

            var_dump($_POST);
            $this->User->addUser($firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            header("Location: collectReadAllUsers/");
        }
    }

    public function collectAddContract() {
        $supervisors = $this->User->readAllSupervisors();
        $teachers =  $this->User->readAllTeachers();
        $obj = $this->outputData->createSupervisorSelectBox($supervisors);
        $obj2 = $this->outputData->createTeacherSelectBox($teachers);

        include 'view/AdminView/create_contract.php';
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
            // $practicalSupervisorId = $_POST["practicalSupervisorId"];
            $logId = $_POST["logId"];

            $this->Contract->addContract($internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $logId);
            header("Location: ../collectReadAllContracts/");
        }
    }

    public function collectReadAllUsers() {
        $users = $this->User->readAllUsers();
        $obj = $this->outputData->createTableAdminUsers($users);
        include 'view/home.php';
    }

    public function collectReadAllContracts() {
        $contracts = $this->Contract->readAllContracts();
        $obj = $this->outputData->createTableAdminContracts($contracts);
        include 'view/home.php';
    }

    public function collectReadOneUser($id) {
        $user = $this->User->readOneUser($id);
        // var_dump($user);
        $obj = $this->outputData->createTable($user);
        include 'view/home.php';
    }

    public function collectReadOneContract($id) {
        $contract = $this->Contract->readOneContract($id);
        // var_dump($contract);
        $obj = $this->outputData->createTable($contract);
        include 'view/home.php';
    }

    public function collectUpdateUser($id) {
        $obj = $this->User->readOneUser($id);
        include 'view/AdminView/update_user.php';
        if(isset($_POST["submit"])) {
            $firstName = $_POST["firstName"];
            $infix = $_POST["infix"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $isTeacher = !empty($_POST["isTeacher"]) ? 1 : 0;
            $isSupervisor = !empty($_POST["isSupervisor"]) ? 1 : 0;
            $school = $_POST["school"];
            $study = $_POST["study"];

            $this->User->updateUser($id, $firstName, $infix, $lastName, $email, $password, $phone, $isTeacher, $isSupervisor, $school, $study);
            header("Location: ../collectReadAllUsers/");
        }
    }


    public function collectUpdateContract($id) {
        $supervisors = $this->User->readAllSupervisors();
        $teachers =  $this->User->readAllTeachers();
        $obj = $this->Contract->readOneContract($id);
        $obj2 = $this->outputData->createSupervisorSelectBox($supervisors);
        $obj3 = $this->outputData->createTeacherSelectBox($teachers);

        include 'view/AdminView/update_contract.php';
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
            $logId = $_POST["logId"];

            $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $logId);
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