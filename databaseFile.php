<?php

require_once("config-member.php");


/**
 * Class Database
 */
class DatabaseFile
{
    // PDO object
    private $_dbh;

    /*
     * Constructs a new Database PDO object
     */
    function __construct()
    {
        $this->_dbh = $this->connect();
    }

    /**
     * @return PDO|null the connection
     */
    function connect()
    {
        try {
            return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    function insertFileName( )
    {


    }





}