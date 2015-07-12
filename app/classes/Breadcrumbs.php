<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/12/2015
 * Time: 03:59
 */

class Breadcrumbs extends BaseController{
    protected $breadcrumbs = [];

    public function __construct() {
        $this->push('หน้าหลัก',URL::to('/'));
    }

    public function getBreadcrumbs(){
        return $this->breadcrumbs;
    }

    public function push($title, $url = null, array $data = [])
    {
        $this->breadcrumbs[] = (object) array_merge($data, [
            'title' => $title,
            'url' => $url,
            'first' => false,
            'last' => false,
        ]);
    }

    public function toArray()
    {
        $breadcrumbs = $this->breadcrumbs;
        // Add first & last indicators
        if ($breadcrumbs) {
            $breadcrumbs[0]->first = true;
            $breadcrumbs[count($breadcrumbs) - 1]->last = true;
        }
        return $breadcrumbs;
    }

    public function generate(){
        View::share('breadcrumbs',$this->toArray());
    }

}