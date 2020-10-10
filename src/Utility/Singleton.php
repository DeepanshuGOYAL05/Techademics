<?php
namespace App\Utility;

class Singleton {
    private static array $_instance = [];

    public static function getInstance() {
        $className = get_called_class();
        if (!isset(self::$_instance[$className])) {
            self::$_instance[$className] = new $className();

            if (method_exists(self::$_instance[$className], 'initializeInstance')) {
                self::$_instance[$className]->initializeInstance();
            }
        }
        return self::$_instance[$className];
    }

    /**
     * Disable constructor
     */
    final private function __construct() {}

    /**
     * Disable clone
     */
    final private function __clone() {}
}
