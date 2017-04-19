<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Api\Lib;

/**
 * Description of response
 *
 * @author linux
 */
class Response {
    public $result = null;
    private $response;
    public $message=null;
    
    
    function setResponse($response, $message){
        $this->response = $response;
        $this->message=$message;
    }
}
