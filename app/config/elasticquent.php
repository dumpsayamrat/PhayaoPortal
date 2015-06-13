<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/8/2015
 * Time: 11:07
 */


return array(

    /*
    |--------------------------------------------------------------------------
    | Custom Elasticsearch Client Configuration
    |--------------------------------------------------------------------------
    |
    | This array will be passed to the Elasticsearch client.
    | See configuration options here:
    |
    | http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_configuration.html
    */

    'config' => [
        'hosts'     => ['localhost:9200'],
        'logging'   => true,
        'logPath'   => storage_path() . '/logs/elasticsearch-' . php_sapi_name() . '.log',
        'logLevel'  => Monolog\Logger::WARNING,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Index Name
    |--------------------------------------------------------------------------
    |
    | This is the index name that Elastiquent will use for all
    | Elastiquent models.
    */

    'default_index' => 'portal',

);