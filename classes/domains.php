<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

class Domains {
	private $_db;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

  public function create($fields = array()) {
        if(!$this->_db->insert('domains', $fields)) {
            throw new Exception('Przepraszamy, wystąpił błąd przy tworzeniu domeny;');
        }
    }
}

