<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

class Invoices {
	private $_db,
            $type = array(1 => array('type'=>'Hosting ekonomiczny'),
                          2 => array('type'=> 'Hosting Biznesowy'),
                          3 => array('type'=>'Hosting Profesjonalny'),
                          4 => array('type'=>'Domena'),
                          5 => array('type'=>'Pozycjonowanie')
                          ),
            $type_int = array(1 => array(),
                              2 => array(),
                              3 => array());

    private $addons = 
                    array(2 => array(1 => array('name' => 'Economy',  'size' => 10,  'price_now' => 7,  'price_full' => 29),
                                             2 => array('name' => 'Business', 'size' => 100, 'price_now' => 15, 'price_full' => 69),
                                             3 => array('name' => 'Professional',  'size' => 200, 'price_now' => 24, 'price_full' => 149)),

                         3 => array(1 => array('name' => 'Economy',  'phrases' => 7,  'price_now' => 19,  'price_full' => 89),
                                              2 => array('name' => 'Business', 'phrases' => 19,  'price_now' => 59, 'price_full' => 299),
                                              3 => array('name' => 'Professional',  'phrases' => 30,  'price_now' => 129, 'price_full' => 549)),

                         1 => array(1 => array('tld' => 'pl', 'status' => 1, 'price_now' => 15, 'full_rice' => 49),
                                            2 => array('tld' => 'eu', 'status' => 1, 'price_now' => 39, 'full_rice' => 89),
                                            3 => array('tld' => 'com', 'status' => 1, 'price_now' => 59, 'full_rice' => 99))
                        );


	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function countInvoices($user = null) {
            $data = $this->_db->get('invoices', array('owner', '=', $user));

            if($data->count()) {
                return $data->count();
            }
        return 0;
    }

    public function viewInvoices($hash)
    {
        $data = $this->_db->get('invoices', array('owner', '=', $hash));
        return $data->results();
    }

    public function invoiceType($type = NULL)
    {
        return $this->type[$type]['type'];
    }

    public function viewInvoice($invoice)
    {
        $data = $this->_db->get('invoices', array('id', '=', $invoice));
        return $data->first();
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('invoices', $fields)) {
            throw new Exception('Wystąpił problem przy próbie stworzenia faktury');
        }
    }

    public function find($invoice = null) {

            $data = $this->_db->get('invoices', array('id', '=', $invoice));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        return false;
    }

    public function lastid()
    {
        return $this->_db->last_id();
    }

    public function update($fields = array(), $id = null) {

        if(!$this->_db->update('invoices', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    public function addonInfo($type, $id, $value)
    {
        return $this->addons[$type][$id][$value];
    }

    public function viewOrder($fv)
    {
        $data = $this->_db->get('orders', array('invoice', '=', $fv));
        return $data->results();
    }


    public function viewUser($hash)
    {
        $data = $this->_db->get('users', array('hash', '=', $hash));
        return $data->first();
    }

}