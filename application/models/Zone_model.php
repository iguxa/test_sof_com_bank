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

    public function getZones() :?array
    {
        $tarifs = null;
        $tarifs_repos = $this->getRepo()->get()->result();
        foreach ($tarifs_repos as $tarifs_repo){
            $tarifs[$tarifs_repo->id] = $tarifs_repo->zone;
        }
        return $tarifs;
    }

}