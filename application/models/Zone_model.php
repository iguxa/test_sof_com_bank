<?php
/**
 * Created by PhpStorm.
 * User: tsybykov
 * Date: 02.04.19
 * Time: 18:25
 */

class Zone_model extends MY_Model
{
    protected $table = 'zones';
    protected $query = null;


    public function __construct()
    {
        parent::__construct();
    }



}