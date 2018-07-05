<?php
namespace Service;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;
use Service\HelloService;

class FrontController {
    private $app = null;
    private $context = null;

    public function __construct() {
        $this->app = new Application();
        $this->setupRoutes();
    }

    public function setupRoutes() {
        Request::enableHttpMethodParameterOverride();
        $this->app->match('/', function (Request $request) {
            $response = [];
            if(!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] !== 'OPTIONS') {
                echo "Hello World";
                exit;
            }
        })->method('GET|OPTIONS');

        $this->app->match('/post', function (Request $request) {
            $service = new HelloService();
            $response = [];
            if(!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] !== 'OPTIONS') {
                $name = $request->get('name');

                echo $service->sayHello($name);
                exit;
            }
        })->method('POST|OPTIONS');
    }

    public function run() {
        $this->app->run();
    }
}
