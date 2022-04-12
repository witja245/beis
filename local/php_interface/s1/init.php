<?php

define('DEFAULT_TEMPLATE_PATH','/local/templates/.default');
define('DEFAULT_TEMPLATE_MAIN_PATH','/local/templates/beis_main');
// функция вывода удобного формата массива
if (!function_exists('printr')) {
    function printr($array)
    {
        GLOBAL $USER;
        if (!$USER->IsAuthorized())
            return false;
        $args = func_get_args();
        if (count($args) > 1) {
            foreach ($args as $values)
                printr($values);
        } else {
            if (is_array($array) || is_object($array)) {
                echo "<pre>";
                print_r($array);
                echo "</pre>";
            } else {
                echo $array;
            }
        }
        return true;
    }
}

function getAge($birthdate, $ageTime = null/*now by default*/){
    return (new DateTime())
        ->setTimestamp($ageTime ? $ageTime : time())
        ->diff(new DateTime($birthdate))->format('%Y');
}
