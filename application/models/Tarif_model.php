<?php
/**
 * Created by PhpStorm.
 * User: tsybykov
 * Date: 02.04.19
 * Time: 18:25
 */

class Tarif_model extends MY_Model
{
    protected $table = 'tarifs';
    protected $query = null;


    public function __construct()
    {
        parent::__construct();
    }

    public function getTarifs() :?array
    {
        $tarifs = null;
        $tarifs_repos = $this->getRepo()->get()->result();
        foreach ($tarifs_repos as $tarifs_repo){
            $tarifs[$tarifs_repo->id] = $tarifs_repo->tarif;
        }
        return $tarifs;
    }

}