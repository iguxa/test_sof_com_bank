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
	public function index()
	{
	    $params = ['name' => 'John Doe'];
        $this->load->model('order_model');
        $orders = $this->order_model->Orders()->get();
        $this->render('templates.index',compact('params','orders'));
	}
	public function order($id)
    {
        $this->load->model('order_model');
        $orders = $this->order_model->OrderById($id)->get();
       // $this->render('templates.index',compact('orders'));

        var_dump($orders);
    }
}
