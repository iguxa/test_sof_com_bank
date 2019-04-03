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
     * @var $tarifs_model Tarif_model
     */
    public $tarif_model;



	public function __construct()
    {
        parent::__construct();
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
        $tarifs = $this->tarif_model->getTarifs();
        $zones = $this->zone_model->getZones();
        $this->render('templates.order',compact('order','tarifs','zones'));

        var_dump($order);
    }
    public function destroy($id)
    {
        $this->order_model->DeleteOrderById($id);
        echo base_url();
    }
}
