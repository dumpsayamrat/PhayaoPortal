<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/25/2015
 * Time: 16:22
 */


class Gov extends Eloquent {
    public $timestamps = true;
    protected $table = 'Gov';

    public function Link(){

        return $this->hasMany("Link");

    }
}