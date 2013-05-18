<?php
    class mysql_functions {
        private $database;
        private $user;
        private $password;
        private $table;
        private $fields;
        private $condition;
        public $db;
		private $server;
        
        function __construct( $site ) {
		/*	switch ($site) {
				case "atfnet":
					if ( strstr($_SERVER['HTTP_HOST'], "aaronfenker.net") ) {
						$this->server = "mysql.nozonenet.com";
						$this->database = "aaronfe_atfnet";
						$this->user = "aaronfe_afenker";
						$this->password = "luther1483";
					} else {
						$this->server = "localhost";
						$this->database = "atfnet";
						$this->user = "root";
						$this->password = "";
					}
					break;
				case "2scsb":
					if ( strstr($_SERVER['HTTP_HOST'], "2scsbfan.info") ) {
						$this->server = "mysql.nozonenet.com";
						$this->database = "aaronfe_SCSB";
						$this->user = "aaronfe_afenker";
						$this->password = "luther1483";
					} else {
						$this->server = "localhost";
						$this->database = "2scsb";
						$this->user = "root";
						$this->password = "";
					}
					break;
			}*/

			$this->server = "localhost";
			$this->database = "aaronfe_scsb";
			$this->user = "aaronfe";
			$this->password = "luther1483";
			
            $this->db = mysqli_connect($this->server, $this->user, $this->password, $this->database);
        }
        
        function mysql_update( $table , $fields = array() , $condition ) {
            global $db;
            
            $clean = array();
        
            foreach ($fields as $key => $value) {
                $clean[] = " `{$key}`='" . mysql_escape_string($value) . "'";
            }
            $query = "UPDATE `{$table}` SET " . implode(", " , $clean) . " WHERE {$condition}";
            mysql_query($query,$db) or die(mysql_errno() . ": " . mysql_error());
        }
        
        function mysql_insert( $table, $fields = array() ) {            
            $clean = array();
            
            foreach ($fields as $value) {
                $clean[] = mysql_escape_string($value);
            }
            
            $query = "INSERT INTO `{$table}` VALUES('" . implode("','" , $clean ) . "')";
                    
            mysql_query($query,$this->db) or die(mysql_errno() . ": " . mysql_error());
        }
        
        function mysql_select( $table , $condition ) {
            $query = "SELECT * FROM `{$table}` WHERE {$condition}";
            $result = mysqli_query( $this->db , $query );
            
            return $result;
        }
        
        function mysql_sort_select( $table , $order , $sort ) {
            //$sort must be ASC or DESC
            
            $query = "SELECT * FROM `{$table}` ORDER BY `$order` $sort";
            
            $result = mysqli_query( $this->db , $query ) or die(mysql_errno() . ": " . mysql_error());
            
            $row = mysqli_num_rows($result);
            
            if ($row == 0) {
                $style = "";
                $script = "";
                
                $error = <<<EOHTML
                            THERE WAS AN UNKNOWN ERROR!  PLEASE CONTACT THE WEBMASTER!!!
EOHTML;
               // $d->display_content($style, $error);
            } else {
                return $result;
            }
        }
        
        function limit_sort_select( $table , $order , $sort , $start , $end) {
            //$sort must be ASC or DESC
            
            $query = "SELECT * FROM `{$table}` ORDER BY `$order` $sort LIMIT $start, $end";
            
            $result = mysqli_query( $this->db , $query ) or die(mysql_errno() . ": " . mysql_error());
            
            $row = mysqli_num_rows($result);
            
            if ($row == 0) {
                $style = "";
                $script = "";
                
                $error = <<<EOHTML
                            THERE WAS AN UNKNOWN ERROR!  PLEASE CONTACT THE WEBMASTER!!!
EOHTML;
                //$d->display_content($style, $error);
            } else {
                return $result;
            }
        }
    }
?>
