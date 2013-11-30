<?php
	/** All your php backend logic + any databse operations should be done here,
	they will be available to your views in variable names **/

	class Index_Model
	{
		private $db;
	    public function __construct()
	    {
	        $this->db = new snapDB_Driver;
	    }

	    private $data = array
	    (
	        'first' => array
	        (
	            'title' => 'First title' ,
	            'content' => 'Content of First element.'
	        )
	        ,
	        'second' => array
	        (
	            'title' => 'Second title' ,
	            'content' => 'Content of Second element.'
	        )
	        ,
	        'third' => array
	        (
	            'title' => 'Third title' ,
	            'content' => 'Content of Third element.'
	        )
	    );

        public function getFromDB($args)
	    {       
	        $query = "SELECT * FROM TABLE_NAME WHERE CONDITION";
	        $this->db->connect();
	        $this->db->prepQuery($query);
	        $this->db->execQuery();
	    
	        $queryResult = $this->db->fetchNextResults('array');
	    
	        return $queryResult;
	    }
	}

?>