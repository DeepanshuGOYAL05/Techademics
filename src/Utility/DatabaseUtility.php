<?php
namespace App\Utility;

class DatabaseUtility extends Singleton {
    /** @var \mysqli */
    protected $connection;

    public static function getInstance(): DatabaseUtility {
        return parent::getInstance();
    }

    public function initializeInstance() {
    }

    /**
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @return void
     */
    public function connect($host, $username, $password, $database) {
        $this->connection = @mysqli_connect($host, $username, $password, $database);
        if (mysqli_connect_errno() || !$this->connection) {
            echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
            exit();
        }
    }

    /**
     * @return \mysqli
     */
    public function getConnection() {
        return $this->connection;
    }

    public function findLogin($table, $id, $password) {
        if (!in_array($table, ['stud', 'teachr', 'parent'])) {
            return null;
        }
        $rows = $this->queryRows('SELECT * FROM `' . $table . '` WHERE `id` = "' . $id . '" && `pwd` = "' . $password . '" LIMIT 1');
        if ($rows && count($rows) === 1) {
            return $rows[0];
        }
        return null;
    }

    public function findLoginBySession($table, $id, $username) {
        if (!in_array($table, ['stud', 'teachr', 'parent'])) {
            return null;
        }
        if ($table === 'stud') {
            $keyName = 'sname';
        } else if ($table === 'teachr') {
            $keyName = 'tname';
        } else if ($table === 'parent') {
            $keyName = 'pname';
        }
        $rows = $this->queryRows('SELECT * FROM `' . $table . '` WHERE `id` = "' . $id . '" && `' . $keyName . '` = "' . $username . '" LIMIT 1');
        if ($rows && count($rows) === 1) {
            return $rows[0];
        }
        return null;
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function queryRows($sql) {
        $rows = [];
        $result = $this->query($sql);
        if ($result) {
            while ($row = mysqli_fetch_object($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        return null;
    }
}