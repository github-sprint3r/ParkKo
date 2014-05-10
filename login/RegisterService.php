<?php

class parkKoRegisterService  
{
		private $host = '119.59.97.37';
		private $user = 'root';
		private $pass = 'logon';
		private $db = 'park_ko';
		private $charset = 'utf8';
		private $table = 'user_register';
		private $query;
		private $insert = array();
		private $result;
		
		
		public function setHost($host)
		{
			 if(!empty($host))
			 {
					$this->host = $host; 
			 }
			 
			 return $this;
		}
		
		public function setUser($user)
		{
			 if(!empty($user))
			 {
					$this->user = $user;  
			 }
			 
			  return $this;
		}
		
		public function setPass($pass)
		{
			 if(!empty($pass))
			 {
					$this->pass = $pass;  
			 }
			 
			  return $this;
		}
		
		public function setDatabase($db)
		{
			 if(!empty($db))
			 {
					$this->db = $db;  
			 }
			 
			  return $this;
		}
		
		public function setCharset($charset)
		{
			 if(!empty($charset))
			 {
					$this->charset = $charset;  
			 }
			 
			  return $this;
		}
		
		public function setTable($table)
		{
			 if(!empty($table))
			 {
					$this->table = $table;  
			 }
			 
			  return $this;
		}
		
		public function startConnect()
		{
			if(!empty($this->host) && !empty($this->user) && !empty($this->pass) && !empty($this->db) )
			{
				 mysql_connect($this->host,$this->user,$this->pass);	
			     
				 mysql_select_db($this->db);
				 				 
				mysql_set_charset($this->charset);
				 
			}else{
				
				die('Error : Necessary data empty! ');	
			}
			
			 return $this;
		}
		
		public function dataQuery($field = '*',$where = '')
		{
			 $data = is_array($field) ? implode(',',$field) : $field;
			 
			 $sql = "SELECT $field FROM  $this->table $where";
			 
			 $this->query = mysql_query($sql);
			 
			 return $this;
		}
		
		public function parseQueryToJson()
		{
			if(!empty($this->query))
			{
				 while($row = mysql_fetch_assoc($this->query))
				 {
						$data[] = $row; 
				 }
				 
				 mysql_free_result();
				 
				 $this->result = json_encode($data);
				 
				 return json_encode($data);
			}
		}
		
		public function insert($field,$data)
		{
			if(!empty($field))
			{	
			 	$this->insert['field'] = implode(',',$field);
				
				$this->insert['data'] = "'".implode("','",$data)."'";	
			}
			
			return $this;
		}
		
		public function  checkDataExist($field,$value)
		{
			//	$sql = " SELECT COUNT($field) AS num FROM $this->table WHERE $field = '$value' ";
				
				$this->dataQuery("COUNT($field) AS num","WHERE $field = '$value'");
				
				$row = mysql_fetch_assoc($this->query);
				
				return $row['num']; 
		}
		
		public function save()
		{
			 if(count($this->insert) == 2)
			 {
					 $sql  = "REPLACE INTO $this->table (".$this->insert['field'].")  VALUES(".$this->insert['data'].") ";
					 
					 return  mysql_query($sql);
			 } 
			 
		}
		
		public function errorQuery()
		{
				
				return 'Error : '.mysql_error(); 
		}
		
		public function  parseJsonToObject()
		{
				if(!empty($this->result)){
					
					return json_decode($this->result);	
				}
		}
		
}


/*$d = new parkKoRegisterService;

$d->startConnect();


$field = array('id','fist_name','gender','last_name','link','local','name','timezone','updated_time','verified','type_api','timeupdate');

$timeUpdate = date('Y-m-d H:i:s');

$data = array(rand(1000,99999),'John','male','Doe','http://www.link.com','Th','John Doe','7','20140510','false',1,$timeUpdate);

$d->insert($field,$data)->save();

echo  $d->checkDataExist('id','123123124333');

/*

$x = $d->dataQuery('fist_name')->parseQueryToJson();

$obj = $d->parseJsonToObject();

echo $obj[0]->{'fist_name'}; 
*/

?>
