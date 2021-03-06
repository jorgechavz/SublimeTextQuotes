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

	public function getAuthors(){
		$sql = "SELECT author,img_src FROM phrases GROUP BY author ORDER BY phrase_id DESC";
		$query = mysql_query($sql) or die("Somethig went wrong in 'getAuthors' method: ".mysql_error());
		return $query;
	}

	public function addQuote($phrase,$author,$img_src){
		$slug = $this->slug($phrase);
		if(!$this->existe($slug)){
			$sql = "INSERT INTO phrases (phrase,author,slug,img_src) VALUES('$phrase','$author','$slug','$img_src')";
			mysql_query($sql);
			return true;
		}else{
			return false;
		}
	}
	public function existe($slug){
		$sql = "SELECT COUNT(phrase_id) as count FROM phrases WHERE slug = '$slug'";
		$query = mysql_query($sql) or die("Something wrong with 'exite' method: ".mysql_error());
		$count = mysql_fetch_array($query);
		if($count['count']==1)
			return true;
		else
			return false;
	}
	public function getNicePhrase($phrase){
		$words = explode(" ", $phrase);
		$half = count($words) / 2;
		$final = "<span class='pink'>";
		for($i = 0;$i < $half-1; $i++){
			$final .= $words[$i]." ";
			unset($words[$i]);
		}
		$final .= "</span>";
		$final .= "<span class='green'>";
		foreach($words as $word){
			$final .= $word." ";
		}
		$final .= "</span>";
		return $final;
	}
	public function getAllPhrases(){
		$sql = "SELECT phrase_id, phrase, img_src, author FROM phrases GROUP BY author ORDER BY phrase_id DESC";
		$query = mysql_query($sql) or die("Somethig went wrong in 'getRandomPhrase' method: ".mysql_error());
		return $query;
	}
	public function getRandomPhrase(){
		$sql = "SELECT phrase_id, phrase, img_src, author FROM phrases ORDER BY rand()";
		$query = mysql_query($sql) or die("Somethig went wrong in 'getRandomPhrase' method: ".mysql_error());
		$fetch = mysql_fetch_assoc($query);
		return $fetch;
	}

	public function getLastPhrase(){
		$sql = "SELECT * FROM phrases ORDER BY phrase_id LIMIT 1";
		$query = mysql_query($sql) or die("Somethig went wrong in 'getRandomPhrase' method: ".mysql_error());
		$fetch = mysql_fetch_array($query);
		return $fetch;
	}
	public function getNextPhrase($phrase_id){
		$phrase_id++;
		$sql 	= "SELECT * FROM phrases WHERE phrase_id = '$phrase_id' LIMIT 1";
		$query 	= mysql_query($sql)or die("Something went wrong in getNextPhrase: ".mysql_error());
		if(mysql_num_rows($query)>0){
			$fetch 	= mysql_fetch_array($query);
			return $fetch;
		}else{
			$sql 	= "SELECT * FROM phrases ORDER BY phrase_id LIMIT 1";
			$query 	= mysql_query($sql)or die("Something went wrong in getNextPhrase: ".mysql_error());
			$fetch 	= mysql_fetch_array($query);
			return $fetch;
		}
	}

	public function getPreviousPhrase($phrase_id){
		$phrase_id--;
		$sql 	= "SELECT * FROM phrases WHERE phrase_id = '$phrase_id' LIMIT 1";
		$query 	= mysql_query($sql)or die("Something went wrong in getNextPhrase: ".mysql_error());
		if(mysql_num_rows($query)>0){
			$fetch 	= mysql_fetch_array($query);
			return $fetch;
		}else{
			$sql 	= "SELECT * FROM phrases ORDER BY phrase_id LIMIT 1";
			$query 	= mysql_query($sql)or die("Something went wrong in getNextPhrase: ".mysql_error());
			$fetch 	= mysql_fetch_array($query);
			return $fetch;
		}
	}


}
?>
