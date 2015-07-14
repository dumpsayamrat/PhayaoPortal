<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/11/2015
 * Time: 16:45
 */

class MajorCategories extends Eloquent {
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'majorcategories';
    protected $fillable = array('name', 'uc_id');
    public function UserCategories()
    {
        return $this->belongsTo('UserCategories');
    }

    public function MiddleCategories(){

        return $this->hasMany("MiddleCategories")->orderByRaw('CONVERT (name USING tis620) asc');
        //->orderBy('name','asc');;
    }
}