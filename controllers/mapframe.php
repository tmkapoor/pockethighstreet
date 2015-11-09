<?php
    /** This is the controller file, all your php back end logic should be performed here **/
    class Mapframe_Controller
    {
        public $template = 'Mapframe';

        /**
         * This is the default function that will be called by router.php
         * 
         * @param array $getVars the GET variables posted to index.php array urlVars hold all the bits of the url
         *  the address http://www.mydomain.com/arg1/arg2, arg1 will denote the page and 
         *  arg 2 will be the function to be called if you dont want to call the main function
         */
        public function main(array $urlVars, array $getVars)
        {
            $model = new Mapframe_Model;
            $view = new View_Model($this->template);
			//Setting page title
			setPageTitle(ucfirst('Mapframe'));

            //This is code to show how you can access and pass variables to the view
            $view->passVars('urlVars', $urlVars);
            $view->passVars('getVars', $getVars);    
        }

        /** This is a sample function toshow how to make a second function in th model
            use URL http://mydomain.com/Mapframe/other to execute tis function instead of the main function **/
        
        /*  UNCOMMENT IF YOU WANT TO USE THIS FUNCTION
        public function other(array $urlVars, array $getVars){
            $model = new Mapframe_Model;
            $view = new View_Model($this->template);
            
            $view->passVars('stuff', 'Some data here !');
            $view->passVars('urlVars', $urlVars);
            $view->passVars('getVars', $getVars);
        }
        */
    }

?>