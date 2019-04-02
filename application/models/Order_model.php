<?php
/**
 * Created by PhpStorm.
 * User: tsybykov
 * Date: 02.04.19
 * Time: 18:25
 */

class Order_model extends CI_Model
{
    protected $table = 'orders1';
    protected $query = null;


    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        //$this->load->database();
    }
    public function get()
    {
        $result = null;
        if($this->query){
          $result = $this->query->get($this->table);
        }
        return $result;
    }

    public function Orders()
    {
        $select = [$this->table.'.id',$this->table.'.distance',$this->table.'.total','zones.zone','tarifs.tarif'];
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

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }


}