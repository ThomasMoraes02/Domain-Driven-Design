<?php 
namespace Alura\CleanArchitecture\config;

use PDO;

require_once __DIR__ . "/../../local_confi.php";

abstract class ConfigApp
{
    public static $configApp;

    public static function setConfig(array $configApp)
    {
        $configApp = self::createInstance($configApp);
        self::$configApp = $configApp;
    }

    public static function config(): array
    {
        return self::$configApp;
    }

    private function createInstance($configApp)
    {
        extract($configApp['DATABASE']);

        $driverDB = $configApp['DATABASE']['DB_DRIVER'];

        switch ($driverDB) {
            case 'mysql':
                $configApp['INSTANCE_DB'] = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
                break;
            
            case 'sqlite':
                $configApp['INSTANCE_DB'] = new PDO('sqlite:' . __DIR__ . './../../database_app.sqlite');
                break;
        }
        return $configApp;
    }
}

ConfigApp::setConfig($configApp);





