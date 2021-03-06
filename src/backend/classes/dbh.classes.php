<?php

use Dot\DotEnv;

include_once 'DotEnv.php';

class Dbh {
    protected $dotEnv ;

    public function __construct(){

    }

    protected function connect(): PDO|null {
        $dotEnv = new DotEnv(__DIR__ . '../../.env');
        $dotEnv->load();
        try {
            $dsn = getenv('DATABASE_DNS');
            $user = getenv('DATABASE_USER');
            $password = getenv('DATABASE_PASSWORD');

            $dbh = new PDO($dsn, $user, $password);
            return $dbh;

        }catch (PDOException $exception){
            print 'Error :' . $exception->getMessage() .' <br>';
            die();
        }
    }
}