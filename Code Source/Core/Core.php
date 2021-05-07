<?php

class Core
{

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    
    public  function __construct()
    {
        $url =  $this->getUrl();

        if (!empty(($url[0]))) {
            if (file_exists('../App/Controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                // ???
                unset($url[0]);
            }
        }
        require_once '../App/Controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;


        // part 2 url
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //GET params
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');

            // The filter_var() function filters a variable with the specified filter.
            // The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
