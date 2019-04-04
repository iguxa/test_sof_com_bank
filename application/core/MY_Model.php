<?php
/**
 * Created by PhpStorm.
 * User: iguxa
 * Date: 03.04.19
 * Time: 2:07
 */
abstract class MY_Model extends CI_Model
{
    protected $query = null;

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
    public function setRepo()
    {
        $query = $this->db;
        $this->query = $query;
        return $this;
    }
    public function getFillable($row) :?array
    {
        $result = null;
        $repos = $this->setRepo()->get()->result();
        foreach ($repos as $repo){
            $result[$repo->id] = $repo->$row;
        }
        return $result;
    }
    public function CountRow()
    {
        return $this->db->count_all_results($this->table);
    }
}