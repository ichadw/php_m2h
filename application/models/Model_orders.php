<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_orders extends CI_Model {

    public $db_table = 'invoices';

	public function process()
	{
		//create new invoice
		$invoice = array(
			'date'		=> date('Y-m-d H:i:s'),
			'due_date'	=> date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
			'status'	=> 'unpaid'
		);
		$this->db->insert('invoices', $invoice);
		$invoice_id = $this->db->insert_id();

		// put ordered items in orders table
		foreach($this->cart->contents() as $item){
			$data = array(
				'id'		=> $id,
				'product_id'		=> $item['id'],
				'product_name'		=> $item['name'],
				'qty'				=> $item['qty'],
				'price'				=> $item['price']
			);
			$this->db->insert('orders', $data);
		}

		return TRUE;
	}

    public function all()
    {
        $query = "SELECT * FROM ".$this->db_table;
        return $this->db->query($query)->result();
    }

    public function get_invoice_by_id($id)
    {
        $hasil = $this->db->where('id',$id)->limit(1)->get('invoices');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return false;
        }
    }

    public function get_orders_by_invoice($id)
    {
        $hasil = $this->db->where('id',$id)->get('orders');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }
    public function record_count(){
        return $this->db->count_all($this->db_table);
    }

    function all_invoices($limit,$start,$col,$dir){
        $query = $this
        ->db
        ->limit($limit,$start)
        ->order_by($col,$dir)
        ->get($this->db_table);

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }
    function invoices_search($limit,$start,$search,$col,$dir){
        $query = $this
        ->db
        ->like('id',$search)
        ->or_like('date',$search)
        ->or_like('due_date',$search)
        ->or_like('status',$search)
        ->limit($limit,$start)
        ->order_by($col,$dir)
        ->get($this->db_table);


        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

    function invoices_search_count($search){
        $query = $this
        ->db
        ->like('id',$search)
        ->or_like('date',$search)
        ->or_like('due_date',$search)
        ->or_like('status',$search)
        ->get($this->db_table);

        return $query->num_rows();
    }
}
