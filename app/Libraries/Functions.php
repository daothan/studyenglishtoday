<?php
	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
				'a' => 'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ',
				'A' => 'À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ',
				'd' => 'đ',
				'D' => 'Đ',
				'e' => 'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ',
				'E' => 'È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ',
				'i' => 'ì|í|ị|ỉ|ĩ',
				'I' => 'Ì|Í|Ị|Ỉ|Ĩ',
				'o' => 'ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ',
				'O' => 'Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ',
				'u' => 'ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ',
				'U' =>'Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ',
				'y' => 'ỳ|ý|ỵ|ỷ|ỹ',
				'Y' => 'Ỳ|Ý|Ỵ|Ỷ|Ỹ'
			);
		foreach($unicode as $en=>$vi){
			$arr = explode("|", $vi);
			$str = str_replace($arr, $en, $str);
		}
		return $str;
	}

	function convert_vi_to_en($str){
		$str = trim($str);
		if($str=="") return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$string = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		/*MB_CASE_UPPER, MB_CASE_TITLE, MB_CASE_LOWER*/
		//$string=str_replace(' ','-',$str);
		$string = str_replace(array('<b>','</b>','<strong>','</strong>'), '<i>', $string);
		$string = str_replace(array('<h1 style="text-align:center">','<h2>'), '<h3>', $string);
		$string = str_replace('<p', '<p class="overflow"', $string);
		$string = str_replace(array('font-family:arial,helvetica,sans-serif'), '', $string);
		return  $string; // Removes special chars.
	}
	function tittle($str){
		$str = trim($str);
		if($str=="") return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$string = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		/*MB_CASE_UPPER, MB_CASE_TITLE, MB_CASE_LOWER*/
		$string=str_replace(' ','-',$str);
		return  $string; // Removes special chars.
	}
	function remove_dash($str){
		$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
		$str = str_replace('-','',$str);
		return $str;
	}

	function cate_parent($data, $parent = 0, $str="-", $select=0){
		foreach ($data as $value){
			$id = $value["id"];
			$name = $value["name"];
			if($value["parent_id"] == $parent){
				if($select != 0 && $id == $select){
					echo "<option value='$id' selected > $str $name </option>";
				}else{
					echo "<option value='$id'>$str $name </option>";
				}
				cate_parent($data,$id,$str." -", $select);
			}
		}
	}
 	?>
