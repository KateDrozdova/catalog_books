<?php //

class Route
{
	static function start()
	{		
		$controller_name = 'Catalog';  
		$routes = explode('/', $_SERVER['REQUEST_URI']);                 
                
                foreach($routes as $value)
                {
                    if($value && "/".$value."/" == $_SERVER['PATH_INFO'] || "/".$value == $_SERVER['PATH_INFO'])
                    {
                        $action_name = substr($value, 0, -4);
                    }
                    elseif ($_SERVER['REQUEST_URI']=="/index.php" || $_SERVER['REQUEST_URI']=="/index.php/")
                    {
                        $action_name = 'index';
                    }
                } 
		$model_name = 'Model_Catalog';
		$controller_name = 'Controller_Catalog';

		$model_file = 'model_catalog.php';
		$model_path = "models/".$model_file;
		if(file_exists($model_path))
		{
                    include "models/".$model_file;
		}
                
		$controller_file = 'controller_catalog.php';
		$controller_path = "controllers/".$controller_file;
		if(file_exists($controller_path))
		{
                    include "controllers/".$controller_file;
		}
		else
		{
                    Route::ErrorPage404();
		}
		
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
                    $controller->$action();
		}
		else
		{
                    Route::ErrorPage404();
		}
	
	}
	
	function ErrorPage404()
	{
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }
}
