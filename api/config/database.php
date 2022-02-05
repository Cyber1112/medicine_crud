<?php

class Database{


    public function __construct(){
        $con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if ( !$con ){
            die("<h1>Database Connection Failed</h1>");
        }

        return $this->con = $con;

    }

}

?>