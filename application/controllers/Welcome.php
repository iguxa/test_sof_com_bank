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


	public function __construct()
    {
        parent::__construct();
        $this->input->raw_input_stream;
        $this->setCleanData();
    }

    public function index()
	{
        $this->render('templates.index',compact('params','orders'));
	}

	public function show()
    {
        $start = $this->input->get('start',true);
        $length = $this->input->get('length',true);
        $order = $this->input->get('order',true);
        $column = $this->input->get('columns',true);
        $paginate['length'] = $length;
        $paginate['start'] = $start;
        $order_by['sort'] = $order[0]['dir'];
        $order_by['by'] = $column[$order[0]['column']]['name'];

        $orders = $this->order_model->OrdersByParams($paginate,$order_by)->get()->result();
        $count_row = $this->order_model->CountRow();
        $result = [
            "recordsTotal"=> $count_row,
            "recordsFiltered"=> $count_row,
            "data"=>$orders ?? false
        ];
        return $this->output->set_output(json_encode($result));
    }


	public function order($id)
    {
        $order = $this->order_model->OrderById($id)->get()->row();
        if(empty($order)){
            show_404();
        }
        $zones = $this->zone_model->getFillable('zone');
        $form_type = 'edit';
        $this->render('templates.order',compact('order','zones','form_type'));
    }
    public function delete()
    {
        $id = $this->input->input_stream('id',true);
        $this->order_model->DeleteOrderById($id);
        return $this->output->set_output(base_url());
    }
    public function edit()
    {
        $id = $this->input->input_stream('id',true);
        $this->order_model->UpdateById($this->clean_data,$id);
        return $this->output->set_output(base_url());
    }
    public function create()
    {
        $zones = $this->zone_model->getFillable('zone');
        $form_type = 'create';
        $this->render('templates.order',compact('zones','form_type'));
    }
    public function store()
    {
        $this->order_model->CreateOrder($this->clean_data);
        return $this->output->set_output(base_url());
    }
    public function form_info($name)
    {
        $model = $name.'_model';
        return $this->output->set_output(json_encode($this->$model->setRepo()->get()->result()));
    }
}
