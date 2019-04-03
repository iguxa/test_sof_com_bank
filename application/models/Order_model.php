<?php
/**
 * Created by PhpStorm.
 * User: tsybykov
 * Date: 02.04.19
 * Time: 18:25
 */

class Order_model extends MY_Model
{
    protected $table = 'orders1';
    protected $query = null;


    public function __construct()
    {
        parent::__construct();
    }

    public function Orders()
    {
        $select = [$this->table.'.id as orders_id',$this->table.'.distance as orders_distance',$this->table.'.total as orders_total',
            'zones.zone as zones_zone','zones.id as zones_id','tarifs.tarif as tarifs_tarif','tarifs.id as tarifs_id'];
        $query = $this->db->
            select($select)->
            join('zones',"zones.id={$this->table}.zones_id")->
            join('tarifs',"zones.tarif_id=tarifs.id");
        $this->query = $query;
        return $this;
    }
    public function OrderById(int $id)
    {
        $this->Orders();
        $this->query = $this->query->where($this->table.'.id',$id)->limit(1);
        return $this;
    }

    public function DeleteOrderById(int $id) :void
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

}