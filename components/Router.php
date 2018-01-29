<?php
/**
 * Created by PhpStorm.
 * User: Івася
 * Date: 23.07.2017
 * Time: 14:50
 */


class Router
{
    private $routes;
    private $regex;

    public function __construct()
    {
        $routerPath = ROOT . '/config/routes.php';
        $this->routes = include($routerPath);
    }

    public function run()
    {
        $uri =  $this->getURI();

        foreach ($this->routes as $urlPattern=>$path) {
            if (preg_match("~$urlPattern~", $uri))
            {
                $internalRoute = preg_replace("~$urlPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                $parameters = $segments;

                if (file_exists($controllerFile))
                    include_once($controllerFile);

                $controllerObject = new $controllerName;
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result != null)
                    break;
            }
        }
    }

    /**
     * Return request string
     * @return string
     */
    private function getURI ()
    {
        if (!empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');

        return false;
    }

    public function getRegex($id=null)
    {
        $regex = null;
        $c = false;
        if(!$id && !empty($_SESSION['userId']))
        {
            if ($this->regex===null)
            {
                $c = true;
                $regex = !empty($_SESSION['regex']) ? $_SESSION['regex'] : null;
                $id = $_SESSION['userId'];
            }
        }

        if (!is_array($regex) && $id)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT DISTINCT(access) as field FROM(
                    SELECT * FROM AccessUser AU WHERE AU.userId=" . $id . "
                    UNION
                    SELECT * FROM AccessGroup AG WHERE AG.groupId IN (SELECT UGU.groupId FROM UserGroupUser UGU WHERE UGU.userId= " . $id . ")
                  )  T");

            $regex = $result->fetch_all(MYSQLI_ASSOC);

            foreach ($regex as $key=>$items)
            {
                $regex[$key] = $items['field'];
            }

            if ($c)
                $_SESSION['regex'] = $regex;
        }

        if (is_array($regex) && $id)
        {
            $this->regex = "^((".implode(')|(', $regex)."))$";

            return $this->regex;

        }
        else
            return "^guest$";
    }

    public static function redirect ($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    public static function getAccess ($access)
    {
        $regex = (new Router)->getRegex();

        if (preg_match('~'.$regex.'~', $access))
            return true;

        return false;
    }
}