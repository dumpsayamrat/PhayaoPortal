<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/11/2015
 * Time: 16:42
 */

class UserCategories extends Eloquent {
    public $timestamps = false;

    protected $table = 'usercategories';

    public function MajorCategories(){

        return $this->hasMany("MajorCategories");

    }
}