<?php

use Slim\App as BaseApp;
use Kuria\Error\ErrorHandler;

class App extends BaseApp
{
    public function __construct($container = [])
    {
        parent::__construct($container);

        $this->replaceErrorHandler();
        $this->getContainer()['db'] = DB::getInstance();
        $this->getContainer()['response'] = new JsonResponse;
    }

    /**
     * @return $this
     */
    protected function registerErrorHandler()
    {
        $debug = !preg_match('#^prod#', $_SERVER['APP_ENV']); // true during development, false in production
        $errorHandler = new ErrorHandler();
        $errorHandler->setDebug($debug);
        $errorHandler->register();

        return $this;
    }

    protected function replaceErrorHandler()
    {
        /** @see https://www.slimframework.com/docs/v3/handlers/error.html */
        unset($this->getContainer()['errorHandler']);
        unset($this->getContainer()['phpErrorHandler']);

        $this->registerErrorHandler();

        return $this;
    }
}