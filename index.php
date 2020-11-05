<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

$button = isset($_GET['type'])? $_GET['type'] : "";
$message = isset($_GET['message'])? $_GET['message'] : "";

// Create the logger
$logger = new Logger('My Logger');

// You can now use your logger
switch ($button){
    case 'INFO':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/info.log', Logger::INFO));
        $logger->pushHandler(new BrowserConsoleHandler());
        $logger->info($message);
        break;
    case 'DEBUG':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/info.log', Logger::DEBUG));
        $logger->pushHandler(new BrowserConsoleHandler());
        $logger->debug($message);
        break;
    case 'NOTICE':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/info.log', Logger::NOTICE));
        $logger->pushHandler(new BrowserConsoleHandler());
        $logger->notice($message);
        break;
    case 'WARNING':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/warning.log', Logger::WARNING));
        $logger->warning($message);
        break;
    case 'ALERT':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/warning.log', Logger::ALERT));
        $logger->alert($message);
        break;
    case 'ERROR':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/warning.log', Logger::ERROR));
        $logger->error($message);
        break;
    case 'CRITICAL':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/warning.log', Logger::CRITICAL));
        $logger->critical($message);
        break;
    case 'EMERGENCY':
        $logger->pushHandler(new StreamHandler(__DIR__.'/log/emergency.log', Logger::EMERGENCY));
        $logger->emergency($message);
        break;
}

require_once 'buttons.html';