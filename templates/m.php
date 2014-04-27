<?php
	/** All your php backend logic + any databse operations should be done here,
	they will be available to your views in variable names **/

	class __PAGE_NAME_REPLACEMENT___Model
	{
		private $db;
	    public function __construct()
	    {
	    	/*If you wish to enable the databse driver
	        $this->db = new snapDB_Driver;*/
	    }

	    /*How to use the database driver
		UNNCOMMENT IF YOU WISH TO USE

	    public function getFromDB($args)
	    {       
	        $query = "SELECT * FROM TABLE_NAME WHERE CONDITION";
	        $this->db->connect();
	        $this->db->prepQuery($query);
	        $this->db->execQuery();
	    
	        $queryResult = $this->db->fetchNextResults('array');
	    
	        return $queryResult;
	    }*/

	    /*Sample data and how to pass to controller

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

		function giveData($key){
			if(isset($data[$key])){
				return $data[$key];
			}
			else{
				return false;
			}
		}

	    */
	}

?>