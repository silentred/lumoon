<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 16/12/2015
 * Time: 9:55 AM
 */

namespace App;


class Application extends \Laravel\Lumen\Application{

    public function getMiddleware(){
        return $this->middleware;
    }

    public function callTerminableMiddleware($response){
        parent::callTerminableMiddleware($response);
    }
}