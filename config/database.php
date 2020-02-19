<?php

require_once(__DIR__ . '/global.php');


class Database
 {

	private $connec;

	public function __construct()
	{

		$this->connexion();
	}

	private function connexion(){
		try
		{
			$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".CHARSET, DB_USER, DB_PASSWORD);
			$this->connec = $bdd;
		}
		catch (PDOException $e)
		{
			$msg = 'Please check your database config';
			die($msg);
		}
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}

    public function prepare($sql)
    {
       return $this->connec->prepare($sql);
    }

    public function lastInsertId(){
       return $this->connec->lastInsertId();
    }

	public function query($sql,Array $cond = null){
		$stmt = $this->prepare($sql);

		if($cond){
			foreach ($cond as $v) {
				$stmt->bindParam($v[0],$v[1],$v[2]);
			}
		}

		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		$stmt=NULL;
	}


}