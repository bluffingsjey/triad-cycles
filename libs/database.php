<?php

/*
**	Database Connection
**	4/4/2014
**	Jayson Salillas
*/

class Database extends PDO {
	
	public function __construct() 
	{
		parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
	}
	
	/**
	 *	Insert
	 *	@param string $table A name of table to insert into
	 *	@param string $data An associative array
	 */
	public function insert($table, $data)
	{
		ksort($data);
			
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key",$value);
		}
		$sth->execute();
	}
	
	/**
	 *	Update
	 *	@param string $table A name of table to insert into
	 *	@param string $data An associative array
	 *	@param string $where The WHERE query part
	 */
	public function update($table, $data, $where)
	{
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key => $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ', ');
		
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key",$value);
		}
		$sth->execute();
	}
	
}