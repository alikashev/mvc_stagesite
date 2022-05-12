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
            $contracts = $this->Contract->readAllContractBySchoolSupervisorId($_SESSION["user"]);
        } else {
            header('Location: ' . SERVER_URL . '/Login/');
        }

        $obj = $this->OutputData->createTableContracts($contracts);
        include 'view/content.php';
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
            include 'view/SupervisorView/create_contract.php';
        } else if ($this->Account->schoolSupervisorCheck()) {
            include 'view/SchoolSupervisorView/create_contract.php';
        } else {
            header('Location: ' . SERVER_URL . '/Home/');
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
            header("Location: " . SERVER_URL . "/Home");
        }
    }

    public function update($id)
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

        $selectSupervisor = $this->OutputData->createSupervisorSelectBox($supervisors, $obj[0]['praktijkbegeleider_stage_id']);
        $selectTeacher = $this->OutputData->createTeacherSelectBox($teachers, $obj[0]['schoolmentor_id']);
        $selectSchoolSupervisor = $this->OutputData->createSchoolSupervisorSelectBox($schoolSupervisors, $obj[0]['stagebegeleider_id']);
        $selectStudent = $this->OutputData->createStudentSelectBox($students, $obj[0]['stagiair_id']);
        $selectCompany = $this->OutputData->createCompanySelectBox($companies, $obj[0]['stage_bedrijven_id']);
        $selectParent = $this->OutputData->createParentSelectBox($parents, $obj[0]['ouder_id']);
        $selectHR = $this->OutputData->createHumanResourcesSelectBox($hr, $obj[0]['vertrouwenspersoon_id']);
        $selectSchoolAccount = $this->OutputData->createSchoolAccountSelectBox($schoolAccounts, $obj[0]['schoolaccount_id']);

        if ($this->Account->adminCheck()) {
            include 'view/AdminView/update_contract.php';
        } else if ($this->Account->supervisorCheck()) {
            include 'view/SupervisorView/update_contract.php';
        } else if ($this->Account->schoolSupervisorCheck()) {
            include 'view/SchoolSupervisorView/update_contract.php';
        } else {
            header('Location: ' . SERVER_URL . '/Home');
        }

        $curUser = $this->User->readOneUser($_SESSION["user"]);

        if (isset($_POST["submit"])) {
            $internId = $_POST["internId"];
            $companyId = $_POST["companyId"];
            $mandatoryHours = $_POST["mandatoryHours"];
            $approvedHours = $_POST["approvedHours"];
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $finished = !empty($_POST["finished"]) ? 1 : 0;
            $supervisorId = !empty($_POST["supervisorId"]) ? $_POST["supervisorId"] : $curUser[0]['id'];
            $schoolSupervisorId = !empty($_POST["schoolSupervisorId"]) ? $_POST["schoolSupervisorId"] : $curUser[0]['id'];
            $teacherId = !empty($_POST["teacherId"]) ? $_POST["teacherId"] : $curUser[0]['id'];
            $parentId = !empty($_POST["parentId"]) ? $_POST["parentId"] : $curUser[0]['id'];
            $hrId = !empty($_POST["humanResourcesId"]) ? $_POST["humanResourcesId"] : $curUser[0]['id'];
            $schoolAccountId = !empty($_POST["schoolAccountId"]) ? $_POST["schoolAccountId"] : $curUser[0]['id'];

            $this->Contract->updateContract($id, $internId, $companyId, $mandatoryHours, $approvedHours, $startDate, $endDate, $finished, $supervisorId, $teacherId, $schoolSupervisorId, $parentId, $hrId, $schoolAccountId);
            header('Location: ' . SERVER_URL . '/Home');
        }
    }
}