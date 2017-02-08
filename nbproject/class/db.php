<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author mc
 */
class db {
    
    private static $instance = null;
    private $_pdo,
            $_query,
            $_count,
            $_error;
    
    
    
    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.config::getConfig('mysql/host').';dbname='.config::getConfig('mysql/dbname'), config::getConfig('mysql/login'), config::getConfig('mysql/pass'));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }        
    }
    
    
    public function getInstance(){
        
        if(!isset(self::$instance)){
            self::$instance= new db();
        }
        return self::$instance;
    }    
}
