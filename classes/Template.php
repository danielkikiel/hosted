<?php
/**
	 *
	 * @copyright	(c) 2016 hosted.pl
	 * @author 		Daniel Kikiel for hosted.pl
	 *
	 */

class Template {
 
	public $toChange;
	public $content;
 
	public function rTemplate()	
	{
		$this->toChange = array();
		$this->content	  = '';
	}
 
	public function setContent($aTemplate)
	{   
		$this->content = $aTemplate;
	}	   

	public function loadTemplate($aFileName)
	{   
		$this->content = file_get_contents('templates/'.$aFileName) or header('location: index.php');
	}   
 
	public function variable($AKey, $AValue)
	{   
		$AKey = '{'.$AKey.'}';
		$this->toChange[$AKey] = $AValue;
	}	
 
	public function execute()
	{   
		if (count($this->toChange) > 0) {
			$tmpKeys = array_keys($this->toChange);	 
 
			foreach ($tmpKeys as $currentKey) {
				$this->content = str_replace($currentKey, 
								   $this->toChange[$currentKey],
								   $this->content);		
			}
		}
		return $this->content;		 
	}	

	public function addContent($aCon)
	{   
		$this->content = $this->content.''.$aCon;
	}	
	public function showError($error)
	{
		if($error)
		{
			return '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        '.$error.'
                                 </div>';
		}
	}
}
 
