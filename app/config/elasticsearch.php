<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/9/2015
 * Time: 12:39
 */

use Monolog\Logger;

return array(
    'hosts' => array(
        'localhost:9200'
    ),
    'logPath' => storage_path() . '/logs/elasticsearch-' . php_sapi_name() . '.log',
    'logLevel' => Logger::INFO
);