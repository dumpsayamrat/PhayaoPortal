<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/11/2015
 * Time: 16:52
 */

class Link extends Eloquent {

    use \Elasticquent\ElasticquentTrait;

    public $timestamps = true;
    protected $table = 'links';
    //public $fillable = ['name', 'link', 'descript'];

    protected $mappingProperties = array(
        'descript' => [
            'type' => 'string',
            'analyzer'=>'thai'
        ],
        'link' => [
            'type' => 'string',
        ],
        'middle_categories_id'=> [
            'type'=>'long'
        ],
        'name'=>[
            'type'=>'string',
            'analyzer'=>'thai'
        ],
        'portal' => [
            'type'=>'string',
            'analyzer'=>'thai'
        ]
    );

    /*protected $mappingProperties = array(
        'name' => array(
            'type' => 'string',
            'analyzer' => 'thai'
        ),'link' => array(
            'type' => 'string',
            'analyzer' => 'standard'
        ),'descript' => array(
            'type' => 'string',
            'analyzer' => 'thai'
        )
    );*/
    /*protected $mappingProperties = array(
        'portal' => array(
            'type' => 'string',
            'analyzer' => 'thai'
        )
    );*/

    public function MiddleCategories()
    {
        return $this->belongsTo('MiddleCategories');
    }
    public function Gov()
    {
        return $this->belongsTo('Gov');
    }
}