<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

class Server {
	private $_db,
			$_data,
			$type = array(1 => array('type'=>'Hosting ekonomiczny', 'price' => 7),
						  2 => array('type'=> 'Hosting Biznesowy', 'price' => 15),
						  3 => array('type'=>'Hosting Profesjonalny', 'price' => 24)
						  );

    private     $whmusername = "root",
                $whmpassword = "VXsLqYcrMp";


	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function countServers($user = null) {
            $data = $this->_db->get('servers', array('owner', '=', $user));

            if($data->count()) {
                return $data->count();
            }
        return 0;
    }

    public function getServerType($type = NULL)
    {
    	return $this->type[$type]['type'];
    }

    public function buyServer($fields)
    {
    	if(!$this->_db->insert('servers', $fields)) {
            throw new Exception('Wystąpił problem przy tworzeniu serwera');
        }
    }

    public function viewServers($owner)
    {
    	$data = $this->_db->get('servers', array('owner', '=', $owner));
    	return $data->results();
    }

    public function getServerPrice($type = NULL)
    {
    	return $this->type[$type]['price'];
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('servers', $fields)) {
            throw new Exception('Wystąpił problem przy próbie stworzenia serweru');
        }
    }

    public function lastid()
    {
        return $this->_db->last_id();
    }

    public function update($fields = array(), $id = null) {

        if(!$this->_db->update('servers', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }



    public function viewServer($server)
    {
        $data = $this->_db->get('servers', array('id', '=', $server));
        return $data->first();
    }

    public function createFTP($userFTP = NULL, $passFTP = NULL, $domainFTP = NULL)
    {
        $query = "https://s1.hosted.pl:2087/json-api/createacct?api.version=1&username=".$userFTP."&domain=".$domainFTP."&plan=default&featurelist=default&quota=0&password=".$passFTP."&ip=n&cgi=1&hasshell=1&contactemail=test@test.pl&cpmod=x3&maxftp=5&maxsql=5&maxpop=10&maxlst=5&maxsub=1&maxpark=1&maxaddon=1&bwlimit=500&language=pl&useregns=1&hasuseregns=1&reseller=0&forcedns=1&mxcheck=local&MAX_EMAIL_PER_HOUR=500&MAX_DEFER_FAIL_PERCENTAGE=80&owner=root";

        $curl = curl_init();                              
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);   
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);   
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        $header[0] = "Authorization: Basic " . base64_encode($this->whmusername.":".$this->whmpassword) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl);

        if ($result == false) {
            return curl_error($curl);
        }
        curl_close($curl);
        return true;
    }

    public function accountsummaryFTP($userFTP = NULL)
    {
        $query = "/json-api/accountsummary?api.version=1&user=".$userFTP;

        $curl = curl_init();                              
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);   
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);   
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        $header[0] = "Authorization: Basic " . base64_encode($this->whmusername.":".$this->whmpassword) . "\n\r";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $query);
        $result = curl_exec($curl);

        if ($result == false) {
            return curl_error($curl);
        }
        curl_close($curl);
        return $result;

    }

}