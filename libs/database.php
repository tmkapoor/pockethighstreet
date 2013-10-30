<?php

	abstract class Database_Library
	{
	    abstract protected function connect();
	    abstract protected function disconnect();
	    abstract protected function prepQuery($query);
	    abstract protected function execQuery();
	    abstract protected function fetchAllResults();
	    abstract protected function fetchNextResults($type = 'object');  
	}
?>