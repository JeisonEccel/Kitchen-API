<?php

require_once 'Connection.php';

class Database extends Connection
{
    private static $stmt;

    //METHODS WITH DB

    //Insert new record on DB
    public function postRequest($sqlString, $param)
    {
        if ($this->sqlIsValid($sqlString)) {
            if (self::$stmt->execute($param)) {
                return array("executed" => true);
            }
        }
        return array("executed" => false, "message" => "Error: .\n" . self::$stmt->error);
    }

    //Fetch multiple records from DB
    public function getRequestMultiple($sqlString, $param)
    {
        $sql = $this->getRecords($sqlString, $param)->fetchAll();
        if (!empty($sql)) {
            return array("exist" => true, "values" => $sql);
        } else {
            return array("exist" => false);
        }
    }

    //Fetch single record from DB
    public function getRequestSingle($sqlString, $param)
    {
        $sql = $this->getRecords($sqlString, $param);
        if ($sql->rowCount() > 0) {
            return array("exist" => true, "values" => $sql->fetch());
        } else {
            return array("exist" => false);
        }
    }

    //Select records from DB
    public function getRecords($sqlString, $param)
    {
        if ($this->sqlIsValid($sqlString)) {
            self::$stmt->execute($param);
            return self::$stmt;
        } else {
            return null;
        }
    }

    //Update record on DB
    public function putRequest($sqlString, $param)
    {
        if ($this->sqlIsValid($sqlString)) {
            if (self::$stmt->execute($param)) {
                return array("executed" => true);
            }
        }
        return array("executed" => false, "message" => "Error: .\n" . self::$stmt->error);
    }

    //Delete record from DB
    public function deleteRequest($sqlString, $param)
    {
        if ($this->sqlIsValid($sqlString)) {
            if (self::$stmt->execute($param)) {
                return array("executed" => true);
            }
        }
        return array("executed" => false, "message" => "Error: .\n" . self::$stmt->error);
    }

    //Check if string is a valid SQL statement
    public function sqlIsValid($sqlString)
    {
        $pdo = $this->getConn();
        self::$stmt = $pdo->prepare($sqlString);

        if (!self::$stmt) {
            return false;
        } else {
            return true;
        }
    }
}
