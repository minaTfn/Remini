<?php
/**
 * Created by PhpStorm.
 * User: OFFICE7
 * Date: 10/14/2020
 * Time: 7:09 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter {

    protected $request;
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * get all the query string via filters() method and add each of them to the query
     * @param Builder $builder
     * @return Builder
     */
    public function Apply(Builder $builder) {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                if(request()->filled($name)){
                    $this->$name($value);
                }
            }
        }

        return $this->builder;
    }


    /**
     * @return array of all query strings
     */
    public function filters() {
        return $this->request->all();
    }


}
