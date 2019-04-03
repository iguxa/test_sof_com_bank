<?php
/**
 * Created by PhpStorm.
 * User: iguxa
 * Date: 03.04.19
 * Time: 2:07
 */
abstract class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $result = null;
        if($this->query){
            $result = $this->query->get($this->table);
        }
        return $result;
    }
    public function getRepo()
    {
        $query = $this->db;
        $this->query = $query;
        return $this;
    }
}