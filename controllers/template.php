<?php
    /**
     * This file handles the retrieval and serving of news articles
     */
    class Template_Controller
    {
        /**
         * This template variable will hold the 'view' portion of our MVC for this 
         * controller
         */
        public $template = 'template';

        /**
         * This is the default function that will be called by router.php
         * 
         * @param array $getVars the GET variables posted to index.php
         */
        public function main(array $urlVars, array $getVars)
        {
            //this is a test , and we will be removing it later
            $vars = print_r($getVars, TRUE);
            $url = print_r($urlVars, TRUE);

            $model = new Template_Model;

            $view = new View_Model($this->template);

            $view->passVars('urlVars', $urlVars);
            $view->passVars('getVars', $getVars);
        }
    }

?>