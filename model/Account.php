<?php
require_once 'model/User.php';

class Account
{
  public function __construct()
  {
    $this->User = new User();
  }

  public function loginCheck()
  {
      if(!empty($_SESSION)) {
         if (isset($_SESSION["user"])) {
             return true;
         } else {
             return false;
         }
      } else {
          return false;
      }
  }

  public function adminCheck()
  {
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      if (intval($user[0]['id']) === 1) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function supervisorCheck()
  {
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      if (intval($user[0]['is_praktijkbegeleider']) === 1) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function schoolSupervisorCheck()
  {
    if (!empty($_SESSION)) {
      $user = $this->User->readOneUser($_SESSION["user"]);
      if (intval($user[0]['is_stagebegeleider']) === 1) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

    public function parentCheck()
    {
        if (!empty($_SESSION)) {
            $user = $this->User->readOneUser($_SESSION["user"]);
            if (intval($user[0]['is_ouder']) === 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}