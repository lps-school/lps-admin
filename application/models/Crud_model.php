<?php
/**
 * Created by PhpStorm.
 * User: Amit
 * Date: 3/1/2016
 * Time: 2:14 PM
 */
if(! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function clear_cache(){
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
}