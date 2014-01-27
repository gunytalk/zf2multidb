<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway,
    Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;

class Migrate extends AbstractTableGateway
{
	private $tableName='fmax_assets';
	
	/**
	 */
	public function __construct(Adapter $adapter)
	{
	   $this->adapter = $adapter;
	//$this->initialize();
	
	}
	public function getNewContent()
	{
		$select = new Select();
		$select->from(array('assest'=>$this->tableName))
		->columns('*')
		->where("parent_id= 32")
		;
		$statement = $this->adapter->createStatement();
		//you can check your query by echo-ing :
		//var_dump($statement);die;
		echo $select->getSqlString();die;
		$select->prepareStatement($this->adapter, $statement);
	}
	
	
}

?>