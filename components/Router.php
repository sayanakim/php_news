<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

// Return type

    // получаем строку запроса
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
        // получить строку запроса
		$uri = $this->getURI();
//        echo $uri;

        // Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {

            // сравниваем $uriPattern с $uri
			if(preg_match("~$uriPattern~", $uri)) {

                // получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // определить какой контроллер, action и параметры обрабатывают запрос
				$segments = explode('/', $internalRoute);

                // создаем имя класса NameController
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName); // делает первую букву заглавной
//                echo $controllerName;

                // определяет имя метода (actionName)
				$actionName = 'action'.ucfirst((array_shift($segments)));
//                echo $actionName;

                $parameters = $segments;

                // подключить файл класса-контроллера
				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                // создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName;

                // создание параметров для function actionView(NewsController)
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
					break;
				}
			}

		}
	}
}