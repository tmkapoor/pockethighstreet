<?php

class snapDB_Driver extends Database_Library
{

	private $host;
	private $user;
	private $password;
	private $database;
	private $port;
	private $socket;

	/*Connection, query and resultsvariables*/
	private $connection;
	private $query;
	private $result;
	
	function __construct() {
		require_once('config/database.php');
		$this->host = $dbHost;
		$this->user = $dbUserName;
		$this->password = $dbPassword;
		$this->database = $dbName;
		$this->port = $dbPort;
		$this->socket = $dbSocket;
   }

	/**
	 * Create new connection to database
	 */ 
	public function connect()
	{		
		$this->connection = new mysqli(
			$this->host, 
			$this->user,
			$this->password,
			$this->database,
			$this->port,
			$this->socket
		);
		if($this->connection)
			return TRUE;
		else
			die("<b>Fatal Error:</b> Unable to connect to database.");
	}

	/**
	 * Break connection to database
	 */
	public function disconnect()
	{
		//clean up connection!
		$this->connection->close();	
		
		return TRUE;
	}
	
	/**
	 * Prepare query to execute
	 * 
	 * @param $query
	 */
	public function prepQuery($query)
	{
		//store query in query variable
		$this->query = $query;
		return TRUE;
	}

	public function debugQuery()
	{
		//store query in query variable
		print("<hr>".$this->query."<hr>");
		return TRUE;
	}
	
	/**
	 * Sanitize data to be used in a query
	 * 
	 * @param $data
	 */
	public function escape($data)
	{
		//return mysqli_real_escape_string($data);
		if($this->connection){
			return $this->connection->real_escape_string($data);	
		}
		else{
			die("<b>Required:</b> Please connect to database using function connect() before calling this function.");
		}
	}
	
	/**
	 * Execute a prepared query
	 */
	public function execQuery()
	{
		if (isset($this->query))
		{
			$this->result = $this->connection->query($this->query);
		
			return TRUE;
		}
		
		return FALSE;		
	}
	
	/**
	 * Fetch a row from the query result
	 * 
	 * @param $type
	 */
	public function fetchNextResults($type = 'object')
	{
		if (isset($this->result) && ($this->result))
		{
			switch ($type)
			{
				case 'array':
				
					//fetch a row as array
					$row = $this->result->fetch_array();
				
				break;
				
				case 'object':
				
				//fall through...
				
				default:
					
					//fetch a row as object
					$row = $this->result->fetch_object();	
						
				break;
			}
			
			return $row;
		}
		
		return FALSE;
	}

	public function fetchAllResults()
	{
		if($this->result){
			$return = array();
			while($row = $this->result->fetch_array()){
				$return[] = $row;
			}
		}
		else{
			return FALSE;
		}
		return $return;
	}
}