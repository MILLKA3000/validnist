<?
 class class_mysql_base

{
  var $sql_login="root";
  var $sql_passwd="admin5";
  var $sql_database="val";
  var $sql_host="127.0.01";

  var $conn_id;
  var $sql_query;
  var $sql_err;
  var $sql_result;

function sql_connect()
 {
  $this->conn_id = mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
  mysql_select_db($this->sql_database);
  mysql_query('SET NAMES cp1251', $this->conn_id);
  //mysql_query('SET NAMES UTF-8', $this->conn_id);
 }

function sql_execute()
 {
  $this->sql_result=mysql_query($this->sql_query,$this->conn_id)or die("�������: " . mysql_error());
  $this->sql_err=mysql_error();
 }

function sql_close()
 {
  mysql_close($this->conn_id);
 }
 
function class_mysql_base($cons)
 {
 // $this->sql_connect();
 } 
//������� ������� �����

function insert($parameter)
 {  
  $this->sql_connect();
  $this->sql_query=$parameter;
  $this->sql_execute();
  $last_id=mysql_insert_id();
  $this->sql_close();
  return $last_id;
 }

function select_question($variant,$predmet)
 {  
  $questions = array(array());
  $i=0;
  
  $this->sql_connect();
  $this->sql_query="SELECT * FROM  `group`,`variant` WHERE `variant`.`id` = `group`.`numvariant` AND `variant`.`variant`=".$variant." AND `variant`.`predmet`=".$predmet.";";
  //$this->sql_query="call `selectgroup`(".$variant.",".$predmet.")";
  $this->sql_execute();
  while($Mas = mysql_fetch_array($this->sql_result))
	{
	   $questions[$i]['id'] = $Mas['id'];   
       $questions[$i]['numvariant'] = $Mas['numvariant']; 
	   $questions[$i]['numquestion'] = $Mas['numquestion']; 
	   $questions[$i]['gr1'] = $Mas['gr1']; 
	   $questions[$i]['gr2'] = $Mas['gr2']; 
	   $questions[$i]['gr3'] = $Mas['gr3']; 
	   $questions[$i]['gr4'] = $Mas['gr4']; 
	   $questions[$i]['gr5'] = $Mas['gr5']; 
	   $questions[$i]['check'] = $Mas['check']; 
	   $questions[$i]['validn'] = $Mas['validn']; 
	   $questions[$i]['discrit'] = $Mas['discrit']; 
	   $questions[$i]['sumstyd'] = $Mas['sumstyd']; 
       $i++;
    }
  $this->sql_close();
  return $questions;
 }
}
?>