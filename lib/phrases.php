<?php 
/**
* Class for managing the phrases
*/
class Phrases
{
	public function slug($name,$utf=true){
		$sname = trim($name); //remover espacios vacios
		$sname = strtolower(preg_replace('/\s+/','-',$sname)); // pasamos todo a minusculas y cambiamos todos los espacios por -
		#if($utf){ // se el texto no viene en formato utf8 se le manda a codificar como tal.
		#$sname = utf8_decode($sname);
		#}
		$table = array(
		'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
		'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
		'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
		'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'S',
		'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
		'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i','î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
		'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
		'ÿ'=>'y', 'R'=>'R', 'r'=>'r', ','=>''
		);
		$sname = strtr($sname, $table); // remplazamos los acentos, etc, por su correspondientes
		$sname = preg_replace('/[^A-Za-z0-9-]+/',"", $sname);
		return $sname;
	}

	public function addQuote($phrase,$author,$img_src){		
		if($this->verifySlug($this->slug($phrase)))
			$sql = "INSERT INTO phrases (phrase,author,img_src) VALUES('$phrase','$author','$img_src')";
			echo $sql;
			$query = mysql_query($sql) or die(mysql_error());				
	}
	public function verifySlug($slug){
		$sql = "SELECT COUNT(phrase_id) as count FROM phrases WHERE slug = '$slug'";
		$query = mysql_query($sql) or die("Something wrong with 'verifySlug' method: ".mysql_error());
		$count = mysql_fetch_array($query);
		if($count['count']==1) 
			return true;
		else
			return false;	
	}
}
?>