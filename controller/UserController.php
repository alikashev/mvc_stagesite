<?php

require_once 'model/User.php';

class UserController {
    public function __construct()
    {

        $this->User = new User();
        $this->outputData = new OutputData();
    }

    public function adminCheck()
    {
        if (!empty($_SESSION)) {
            $user = $this->User->readOneUser($_SESSION["user"]);
            if (intval($user[0]['id']) === 1)  {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function supervisorcheck()
    {
        if (!empty($_session)) {
            $user = $this->user->readoneuser($_session["user"]);
            if (intval($user[0]['is_praktijkbegeleider']) === 1)  {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function schoolSupervisorcheck()
    {
        if (!empty($_session)) {
            $user = $this->user->readoneuser($_session["user"]);
            if (intval($user[0]['is_stagebegeleider']) === 1)  {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Index()
    {
        self::readAll();
    }

    public function readAll()
{
    session_start();
    $count = 0;
    if ($this->adminCheck()) {
        $users = $this->User->readAllUsers();
        $obj = $this->outputData->createTableAdminUsers($users);
    } else if ($this->supervisorcheck()) {
        $users = $this->User->supervisorReadAllUsers();
        $obj = $this->outputData->createTableSupervisorUsers($users);
    } else {
        header('Location: ' . SERVER_URL . '/Login/');
    }

    include 'view/home.php';
}
}