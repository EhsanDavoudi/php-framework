<?php
namespace system;

#[\AllowDynamicProperties]
class Base
{
    public $db;
    public $session;
    
    public function __construct() {
        global $db, $session;
        $this->db = $db;
        $this->session = $session;
    }

    public function load($type, $target, $asNewName = false)
    {
        switch ($type) {
            case 'models':
                $className = ucfirst($target);
                include_once MODEL_DIR . $className . '.php';
                break;
        }
    }
}