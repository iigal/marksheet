<?PHP 
class db_mysql{
	var $conn;
	var $error = array();
	
	//Constructor
	function db_mysql(){
	
	# $option = array("host"=>"web-db1.wlink.com.np", "user"=>"dhrcnepal", "password"=>"rcNep@123#Cora", "dbname"=>"dhrcnepal");
		$option = array("host"=>"localhost", "user"=>"root", "password"=>"", "dbname"=>"school");
		$this->conn = mysql_connect($option['host'], $option['user'], $option['password']);
		if (!mysql_select_db($option['dbname'])){
			$this->error[] = "ERROR: Cannot select database".$option['dbname']."\n";
		}
	}
	
	//INSERT FUNCTION
	function insert($table, $data){
		if (count($data)==0) {
			$this->error[] = "ERROR: Invalid data\n";
			return false;
		}
		$keys = array(); $values = array();
		foreach($data as $k => $v){
			$keys[] = $k;
			$values[] = "'".$this->_escape($v)."'";
		}
		$sql = sprintf("INSERT INTO %s (%s) VALUES (%s);", $table, implode(",", $keys), implode(",", $values));
		if($this->_query($sql)){
			echo "Data Inserted";
			return true;
		}else{
			$this->error[] = "ERROR: Cannot insert the records into database\n".$sql;
			return false;
		}
	}

	//UPDATE FUNCTION
	function update($table, $keys, $data){
		/*if(is_string($keys)){
			$keys=array($keys);
		}*/
		$d = array();
		foreach ($data as $k => $v) {
			$d[] = $k."='".$this->_escape($v)."'";
		}
		$sql = sprintf("UPDATE %s SET %s WHERE %s", $table, implode(",",$d), implode(" AND ", $keys));
		if ($this->_query($sql)){
			return true;
		}else{
			$this->error[] = "ERROR: Cannot update the records into database\n".$sql;
			return false;
		}
	}

	//DELETE FUNCTION
	function delete($table, $keys){
		if(is_string($keys)){
			$keys=array($keys);
		}
		$sql = sprintf("DELETE FROM %s WHERE %s", $table, implode(" AND ", $keys));
		if ($this->_query($sql)){
			return true;
		}else{
			$this->error[] = "ERROR: Cannot delete the records from database\n".$sql;
			return false;
		}
	}	

	function query($sql){
		$results = $this->_query($sql);
		return new mysql_records($results);
	}

	function _query($sql){
		return mysql_query($sql);
	}

	function _escape($text){
		return mysql_real_escape_string(html_entity_decode(stripslashes(trim($text))));
	}

	function destroy(){
		mysql_close($this->conn);
	}
}
class mysql_records{
	var $records;
	
	function mysql_records($result_set) {
		$this->records = $result_set;
	}
	
	function fetch_assoc(){
		if($this->records)
			return mysql_fetch_assoc($this->records);
		else
			return false;
	}
	
	function next($type=0) {
		if ( $this->records ) {
			if ( is_string($type) ) {
				return mysql_fetch_array($this->records);
			} else {
				return mysql_fetch_row($this->records);
			}
		} else {
			return false;
		}
	}

	function count() {
		return mysql_num_rows($this->records);
	}
}

