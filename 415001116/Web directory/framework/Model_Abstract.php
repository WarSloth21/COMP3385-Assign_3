<?php
namespace Haa\framework;

use mysqli;

abstract class Model_Abstract
{
	protected $sql = null;
	protected $cached_json = [];
	
	abstract public function findAll() : array;
	
	abstract public function find(string $tablename, array $fields);
	
	abstract public function findRecord(string $id) ;
	
	public function loadData(string $fromFile) : array
	{
		$filename = basename($fromFile, '.json');
		if (!isset($this->cached_json[$filename]) || empty($this->cached_json[$filename])) 
		{
			$json_file=file_get_contents($fromFile);
			$this->cached_json[$filename] = json_decode($json_file, true);
		}
		return $this->cached_json[$filename];
	}


	public static function makeConnection() 
	{
			$host = "localhost";
			$user = "root";
			$pass = '';
			$db = "mooc";

			$sql = new mysqli($host, $user, $pass, $db);

			if($sql->connect_error)
			{
            	die("Cannot connect to database" . $sql->connect_error);
				}
				else
				{
					return $sql;
				}
	}
	
}