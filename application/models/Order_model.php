<?php
/**
 * Created by PhpStorm.
 * User: tsybykov
 * Date: 02.04.19
 * Time: 18:25
 */

class Order_model extends MY_Model
{
    protected $table = 'orders';
    protected $query = null;


    public function __construct()
    {
        parent::__construct();
    }

    public function setOrders()
    {
        $select = [$this->table.'.id as orders_id',$this->table.'.distance as orders_distance',$this->table.'.created_at as orders_created_at',$this->table.'.total as orders_total',
            'zones.zone as zones_zone','zones.id as zones_id','zones.price as zones_price'];
        $query = $this->db->
            select($select)->
            join('zones',"zones.id={$this->table}.zones_id")
        ;
        $this->query = $query;
        return $this;
    }
    public function OrderById(int $id)
    {
        $this->setOrders();
        $this->query = $this->query->where($this->table.'.id',$id)->limit(1);
        return $this;
    }

    public function DeleteOrderById(int $id) :void
    {
        $this->db->delete($this->table, ['id' => $id]);
    }
    public function UpdateById(array $data,int $id)
    {
        $this->db->update($this->table, $data, array('id' => $id));
    }
    public function CreateOrder($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function OrdersByParams($offset,$order)
    {
        $this->setOrders();
        $this->query = $this->query->limit($offset['length'],$offset['start'])->order_by($order['by'], $order['sort']);
        return $this;
    }


}