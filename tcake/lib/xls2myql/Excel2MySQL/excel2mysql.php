<?php
require_once 'reader.php';



class Excel2MySQL
{
/**
* 
* purpose : convert excel file to mysql data
* author  : anghuda
* email	  : anghuda@yahoo.com
* website : http://blog.lentera.web.id
* cpyrite : anghuda
* lisence : http://www.php.net/license/3_0.txt  PHP License 3.0
* 
* require : Spreadsheet_Excel_Reader by Vadim Tkachenko <vt@phpapache.com>
* 
* version : 0.0.1 07 July 2008
* ....... : 0.0.2 18 July 2008
**/
	private $row_start;
	private $col_start;
	private $row_end;
	private $col_end;
	private $col_names;
	private $col_tb_names;
	private $col_mapping;
	private $row_empty_end;
	private $col_empty_end;
	private $row_head;
	private $db_fields;
	private $tbl_name;
	private $db_name;
	
	private $excel_file;

	function __construct( $file )
	{
		$this->row_start 		= 1;
		$this->col_start 		= 1;
		$this->row_empty_end 	= 5;
		$this->col_empty_end 	= 5;
		$this->row_end			= 0;
		$this->col_end			= 0;
		$this->row_head 		= false;
		$this->col_names 		= array();
		$this->col_tb_names		= array();
		$this->excel_fle 		= $file;
		
	}

	public function setConvertArea( $area )
	{
		$num_area 			= $this->convertAreatoNumber( $area );
		$this->col_start 	= $num_area[1];
		$this->row_start 	= $num_area[2];
		$this->col_end 		= $num_area[3];
		$this->row_end 		= $num_area[4];
					
	}
 
	public function setFirstRowHead()
	{
		$this->row_head = true;
	}


	public function setRowStart( $start )
	{
		$this->row_start = $start;
	}

	public function setRowEnd( $end )
	{
		$this->row_end = $end;
	}
	
	public function setColStart( $str )
	{
		
		$this->col_start = $this->strColtoNumber( $str );
	
	}

	public function setColEnd( $str )
	{
		
		$this->col_end = $this->strColtoNumber( $str );
	
	}

	public function setColMapping( $mapping )
	{ 
			
		$this->col_mapping = $mapping;
		
	}
	
	/* convert excel file to array */
	public function parse2Array()
	{
		$sheet = new Spreadsheet_Excel_Reader();
		$sheet->setOutputEncoding('UTF-8');
		$sheet->read( $this->excel_fle );
	
		
		$row_end  		= $this->row_end;
		$col_end		= $this->col_end;
					
		if(empty($row_end)) $row_end = $sheet->sheets[0]['numRows'];
		if(empty($col_end)) $col_end = $sheet->sheets[0]['numCols'];
		
				
		for ( $i = $this->row_start; $i <= $row_end; $i++ ) 
		{
			
			
			for ($j = $this->col_start; $j <= $col_end; $j++) 
			{				
				 	
				if ( empty( $sheet->sheets[0]['cells'][$i][$j]))
				{
					
					/* do nothing if cell is empty */
										
				} else {
				
					if($i==$this->row_start) 
					{
						/* grab column name  */
						$this->col_names[$j] = $sheet->sheets[0]['cells'][$i][$j];
						
						/* map column name */
						if(in_array( $this->col_names[$j], array_keys($this->col_mapping ))) 
							$this->col_tb_names[$j] = $this->col_mapping[ $this->col_names[$j] ];						
						
					} else {

						/* grab cell data  */
						$contents[$i][ $this->col_tb_names[$j] ] = $sheet->sheets[0]['cells'][$i][$j];
					}
				}

			}
			
		}
		return $contents;
	}


	public function connectDB ($host,$user,$passwd,$db_name,$db_table) {
		
		$this->db_conn = mysql_connect ($host,$user,$passwd);
		$this->db_name = $db_name;	
		$this->db_table = $db_table;	
		
	}
	
	function evalDB() {

		$tbl_name = $this->db_table;

		$field_names = implode(",", $this->col_tb_names);
		
		$query 		 = "SELECT $field_names FROM $tbl_name";
		

		$result = mysql_db_query($this->db_name, $query, $this->db_conn);
		$count  = mysql_num_fields($result);

		for ($j=0; $j < $count; $j++) {
		
			$type = mysql_field_type($result, $j);
			$name = mysql_field_name($result, $j);
			$this->db_fields[$name]['type'] = $type;
		
		}

	}
	
	
	public function injectData() {
	
		$arr_data = $this->parse2Array();
		
		$this->evalDB();
	
		
		$query = "INSERT INTO  $this->db_table ( " . implode(',', $this->col_tb_names) ." ) VALUES ";
		
		$val_query = "";
		
		/* next row for data */
		$this->row_start++;
	
		for( $i=$this->row_start; $i < $this->row_start+count($arr_data); $i++ ){
			
			 
			 $o_query = "(";
			 
			 reset($this->col_tb_names);
			 $v_query = ""; 

			 while (list($key, $val) = each($this->col_tb_names)) {
			 	
				$type = $this->db_fields[ $val ]['type'];
				
				switch( $type ) {
				
					case 'int' :
						$v_query .= $arr_data[$i][$val] . ",";
						break;
					case 'date' :
						$v_query .= "'" . $this->xl2timestamp( $arr_data[$i][$val] )."',";
						break;
					default :
						$v_query .= "'".$arr_data[$i][$val]."',";
				}
					
			 }
			 
			 $v_query = rtrim($v_query,',');
			 
			 $val_query .= $o_query . $v_query . "),";
		}
		
			
			
		$val_query  = rtrim($val_query,',') . ";";
		
		/* inject into database */
		mysql_query( $query  . $val_query);
	}

	/* convert column characters to numbers */
	function strColtoNumber( $str ) 
	{
		if( strlen($str) > 1)
		{
			$arr_str 	= str_split($str);
			$num_1 		= ord( $arr_str[0] ) - 64 + ( (ord( $arr_str[0] ) - 64) * 25);
			$num_2 		= ord( $arr_str[1] ) - 64;
			
			return $num_1 + $num_2;			
		} else {
		
			$num 		= ord( $str ) - 64;
			
			return $num;
		}
	
	}

	/* convert input area string to associative numbers */
	function convertAreatoNumber( $area ) 
	{
	
		/* purify input */
		$area = str_replace(':','',$area);
		$area = ltrim($area,'$');

		/* parse column & row number */
		list($col_start, $row_start, $col_end, $row_end) = explode('$', $area);
		
		$num_area[1] 	= $this->strColtoNumber(  $col_start );
		$num_area[2] 	= $row_start;
		$num_area[3] 	= $this->strColtoNumber(  $col_end );
		$num_area[4]	= $row_end;
		
		return $num_area;	
	}

	/* convert excel date to mysql date format */
	function xl2timestamp( $xl_date )
	{
		$excel_timestamp 	= $xl_date - 25568;
		$php_timestamp 		= mktime(0,0,0,1,$excel_timestamp,1970);
		
		$mysql_timestamp 	= date('Y-m-d', $php_timestamp);
		
		return $mysql_timestamp;
	}
}

?>
