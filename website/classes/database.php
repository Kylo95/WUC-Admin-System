<?php
	//Database connection details
	$server = 'v.je';
	$username = 'student';
	$password = 'student';
	$schema = 'wuc';

	//Connect to database
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
	[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	
	//Create the database table class
	class DatabaseTable {
		
		//Declare class parameters
		private $pdo;
		private $tableName;
		private $pk;
		
		//Constructor
		public function __construct($pdo, $tableName) {
			
			//Obtain primary key from table
			$query = 'SHOW KEYS FROM ' . $tableName . ' WHERE Key_name = "PRIMARY"';
			$stmt = $pdo->query($query);
			$pk = $stmt->fetch()['Column_name'];

			//Set values
			$this->pdo = $pdo;
			$this->tableName = $tableName;
			$this->pk = $pk;
		}
		
		//Database Functions
		public function find($record) {
			$query = 'SELECT * FROM ' . $this->tableName . ' WHERE ';
			
			$parameters = [];
			foreach ($record as $key => $value)
				$parameters[] = $key . ' = :' . $key;
			$query .= implode(' AND ', $parameters);
			
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
			
			return $stmt;
		}
		
		public function allData() {
			$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->tableName);
			
			$stmt->execute();
			
			return $stmt;
		}
		
		//Private so it can only be accessed by the class
		private function insert($record) {
			$keys = array_keys($record);
				
			$attributes = implode(', ', $keys);
			$values = ':' . implode(', :', $keys);
				
			$query = 'INSERT INTO ' . $this->tableName . ' (' . $attributes . ') VALUES (' . $values . ')';

			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
		}
		
		private function update($record)
		{
			$query = 'UPDATE ' . $this->tableName . ' SET ';
			
			$parameters = [];
			foreach ($record as $key => $value)
				$parameters[] = $key . ' = :' . $key;
			$query .= implode(', ', $parameters);
			
			$query .= ' WHERE ' . $this->pk . ' = :pk';

			$record['pk'] = $record[$this->pk];
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
		}
		
		//Try insert, if fails then update record
		public function save($record) {
			try {
				$this->insert($record);
			}
			catch (Exception $e) {
				$this->update($record);
			}
		}
		
		public function delete($record) {
			$query = 'DELETE FROM ' . $this->tableName . ' WHERE ';
			
			$parameters = [];
			foreach ($record as $key => $value)
				$parameters[] = $key . ' = :' . $key;
			$query .= implode(' AND ', $parameters);
			
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
		}
		
		//Move data from one table to another
		public function move($record, $table) {
			$newRecord = $this->find($record);
			$table->save($newRecord);
			$this->delete($newRecord);
		}
	}
?>