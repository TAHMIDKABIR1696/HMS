<?php

namespace App\Helpers;

class Singleton
{
    private static $instance = null; // Holds the single instance
    private $settings = [];

    // Private constructor prevents direct instantiation
    private function __construct()
    {
        // Example default settings
        $this->settings = [
            'app_name' => 'Hospital Management System',
            'version' => '1.0',
            'timezone' => 'Asia/Dhaka',
        ];
    }

    // Get the single instance
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    // Get a setting
    public function get($key)
    {
        return $this->settings[$key] ?? null;
    }

    // Set a setting
    public function set($key, $value)
    {
        $this->settings[$key] = $value;
    }
}