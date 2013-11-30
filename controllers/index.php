<?php
    /** This is the controller file, all your php back end logic should be performed here **/
    class Index_Controller
    {
        public $template = 'Index';

        /**
         * This is the default function that will be called by router.php
         * 
         * @param array $getVars the GET variables posted to index.php array urlVars hold all the bits of the url
         *  the address http://www.mydomain.com/arg1/arg2, arg1 will denote the page and 
         *  arg 2 will be the function to be called if you dont want to call the main function
         */
        public function main(array $urlVars, array $getVars)
        {
            $model = new Index_Model;
            $view = new View_Model($this->template);
			//Setting page title
			setPageTitle(ucfirst("page title"));
            //This is code to show how you can access and pass variable
            $view->passVars('urlVars', $urlVars);
            $view->passVars('getVars', $getVars);

            if(isset($getVars['author'])){
                $article = $model->get_article($getVars['author']);
                $view->passVars('article', $article);
            }
            

        }

        /** This is a sample function toshow how to make a second function in th model
            use URL http://mydomain.com/Index/other to execute tis function instead of the main function **/
        public function other(array $urlVars, array $getVars){
            $model = new Index_Model;
            $view = new View_Model($this->template);
            
            $view->passVars('stuff', 'Some data here !');
            $view->passVars('urlVars', $urlVars);
            $view->passVars('getVars', $getVars);
        }
    }

?>