<?php
namespace App\Utility;

class SessionUtility extends Singleton {
    protected $user = null;

    public static function getInstance(): SessionUtility {
        return parent::getInstance();
    }

    public function initializeInstance() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_GET['logout'])) {
            $this->logout();
        }
    }

    public function logout() {
        $_SESSION['table'] = null;
        $_SESSION['usr'] = null;
        $_SESSION['name'] = null;
        $this->user = null;
        header('Location: /');
        exit();
    }

    public function checkSession() {
        $table = isset($_SESSION['table']) ? $_SESSION['table'] : '';
        $userId = isset($_SESSION['usr']) ? $_SESSION['usr'] : '';
        $username = isset($_SESSION['name']) ? $_SESSION['name'] : '';
        if (!empty($table) && !empty($userId) && !empty($username)) {
            $databaseUtility = \App\Utility\DatabaseUtility::getInstance();
            $this->user = $databaseUtility->findLoginBySession($table, $userId, $username);
            if (!$this->user) {
                $this->logout();
            }
        }
    }

    public function performLogin() {
        $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
        $password = isset($_POST['pswd']) ? $_POST['pswd'] : '';

        $mapLoginTable = ['s' => 'stud', 't' => 'teachr', 'p' => 'parent'];
        $mapRedirect = ['s' => 'student', 't' => 'teacher', 'p' => 'parent'];

        $tableId = '';
        $username = '';
        $data = explode('.', $userid);
        if (isset($data) && count($data) === 2) {
            $tableId = $data[0];
            $username = $data[1];
        }

        if (!empty($tableId) && !empty($username) && !empty($password) && isset($mapLoginTable[$tableId]) && isset($mapRedirect[$tableId])) {
            $databaseUtility = \App\Utility\DatabaseUtility::getInstance();
            $this->user = $databaseUtility->findLogin($mapLoginTable[$tableId], $username, $password);
            if ($this->user) {
                $_SESSION['table'] = $mapLoginTable[$tableId];
                $_SESSION['usr'] = $this->user->id;
                if ($mapLoginTable[$tableId] === 'stud') {
                    $_SESSION['name'] = $this->user->sname;
                } else if ($mapLoginTable[$tableId] === 'teachr') {
                    $_SESSION['name'] = $this->user->tname;
                } else if ($mapLoginTable[$tableId] === 'parent') {
                    $_SESSION['name'] = $this->user->pname;
                }

                header('Location: /' . $mapRedirect[$tableId] . '/');
                exit();
//                return true;
            }
        }
        return false;
    }

    public function getUser() {
        return $this->user;
    }
}