<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/9/2015
 * Time: 12:58
 */

use Elasticquent\ElasticquentTrait;

class Post extends \Eloquent {
    use ElasticquentTrait;

    public $fillable = ['title', 'content', 'tags'];

    protected $mappingProperties = array(
        'title' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'content' => [
            'type' => 'string',
            "analyzer" => "standard",
        ],
        'tags' => [
            'type' => 'string',
            "analyzer" => "stop",
            "stopwords" => [","]
        ],
    );
}
