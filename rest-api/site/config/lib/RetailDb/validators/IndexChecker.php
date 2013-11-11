<?php
/**
 * Check for non-repeating values of a table. ...
 * @author Tapion Family
 *
 */
class IndexChecker implements IChecker{
	/**
	 * The Table name to be checked ...
	 * @var String
	 */
	private $tableName = "";
	/**
	 * The column name to be checked ...
	 * @var String
	 */
	private $columnName = "";
	/**
	* The value to be checked against
	 */
	private $value = "";
	
	private $id = "";
	
	public function __construct($tableName, $columnName, $value, $id=""){
		$this->tableName = $tableName;
		$this->columnName = $columnName;
		$this->value = Request::getSafeGetOrPost($value);
		$this->id = $id;
	}
	/**
	 *  Returns true if value is not existing
	 * (non-PHPdoc)
	 * @see IChecker::check()
	 */
	public function check(){
		$name = $this->tableName."Dao";
		$dao = new $name();
		try{
			if ($this->id!=""){
				$result = $dao->getWithSql("SELECT * FROM {$this->tableName} WHERE {$this->columnName} = '{$this->value}' AND {$this->tableName}Id <> {$this->id}", false);
			}else{
				$result = $dao->getWithSql("SELECT * FROM {$this->tableName} WHERE {$this->columnName} = '{$this->value}'", false);
			}
			
			//echo "SELECT * FROM {$this->tableName} WHERE {$this->columnName} = '{$this->value}'";
		}catch(Inform8DbException $e){
			$result = array();	
		}
		return empty($result);
	}
	public function getMessage(){
		return "";
	}
	public function json_result(){
		$output = array();
		$output[] = array("message"=>"{$this->value} is already existing for ".ucwords($this->columnName), "code"=>"exist");
		
		return $output;
	}	
}