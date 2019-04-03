<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**
	 * @var Order_model $order_model
	 */
	public $order_model;
    /**
     * @var Zone_model $zones_model
     */
    public $zone_model;
    /**
     * @var Tarif_model $tarifs_model
     */
    public $tarif_model;

	public function __construct()
    {
        parent::__construct();

        $this->input->raw_input_stream;
    }

    public function index()
	{
	    $params = ['name' => 'John Doe'];
        $orders = $this->order_model->Orders()->get()->result();
        $this->render('templates.index',compact('params','orders'));
	}
	public function order($id)
    {
        $order = $this->order_model->OrderById($id)->get()->row();
        if(empty($order)){
            show_404();
        }
        $tarifs = $this->tarif_model->getFillable('tarif');
        $tarifs_price = $this->tarif_model->getFillable('price');
        $zones = $this->zone_model->getFillable('zone');
        $this->render('templates.order',compact('order','tarifs','zones','tarifs_price'));
    }
    public function delete()
    {
        $id = $this->input->input_stream('orders_id');
        $this->order_model->DeleteOrderById($id);
        echo base_url();
    }
    public function edit()
    {
        /*$this->order_model->DeleteOrderById($id);
        echo base_url();*/
        $id = $this->input->input_stream('orders_id');

        var_dump($id);
    }
    public function form_info($name)
    {
        $model = $name.'_model';
       echo json_encode($this->$model->setRepo()->get()->result()) ;
    }
}
