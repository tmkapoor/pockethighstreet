<?php
	/** All your php backend logic + any databse operations should be done here,
	they will be available to your views in variable names **/

	class __PAGE_NAME_REPLACEMENT___Model
	{
		private $dbConn = false;
	    public function __construct()
	    {
	    	require_once('libs/database.php');
	        //UNCOMMENT IF REQUIRED: This function will connect to the database whose details you provided in
	        //the config/database.php file, if not go configure it now.
	        //$dbConn = connectToDB();
	    }


	    //Temporary code, remove
	    private $articles = array
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

	    //UNCOMMENT IF REQUIRED
	    //private $tableName = "some_table";
	}

?>