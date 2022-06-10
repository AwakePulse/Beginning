<?php


/**
 * Класс для обработки ЧПУ-запросов
 * @author дизайн студия ox2.ru
 */
class Router
{
    private $_route = array(); //Переменная хранит маршруты, и файлы, которые будут открываться при определеном маршруте

    /**
     * Метод для установки маршрута, и файла который будет открываться при заданом маршруте
     * @param <string> $dir - маршрут
     * @param <string> $file - адрес файла
     */
    public function setRoute($dir, $file)
    {
        $this->_route[trim($dir, "/")] = $file;
    }

    /**
     * Метод смотрит текущий адрес, и сверяет его с установленными маршрутами,
     * если для открытого адреса установлен маршрут, то открываем страницу
     * @return <boolean>
     */
    public function route()
    {
        if (!isset($_SERVER["PATH_INFO"])) { //Если открыта главная страница
            include_once "index.html"; //Открываем файл главной страницы
        } elseif (isset($this->_route[trim($_SERVER["PATH_INFO"], "/")])) { //Если маршрут задан
            include_once $this->_route[trim($_SERVER["PATH_INFO"], "/")]; //Открываем файл, для которого установлен маршрут
        } else return false; //Если маршрут не задан

        return true;
    }
}

$route = new Router;
$route->setRoute("page/article-1/", "1.html"); //Устанавливаем маршрут "page/article-1/", и файл который будет открываться при этом маршруте
$route->setRoute("article-2", "2.html");
if (!$route->route()) { //Если маршрут не задан..
    echo "Маршрут не задан";
}

