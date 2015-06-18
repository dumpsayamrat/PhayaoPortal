<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/11/2015
 * Time: 16:48
 */

class MiddleCategories extends Eloquent {
    public $timestamps = false;
    protected $table = 'middlecategories';

    public function MajorCategories()
    {
        return $this->belongsTo('MajorCategories');
    }

    public function Link(){

        return $this->hasMany("Link")->orderBy('frequency','DESC');

    }
}