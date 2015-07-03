<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/3/2015
 * Time: 01:11
 */
class Recommend extends Eloquent
{
    public $timestamps = true;
    protected $table = 'recommend';

    public function scopeIdDescending($query)
    {
        return $query->orderBy('frequency','DESC');
    }
}