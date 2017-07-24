<?php
	function stripUnicode($str){
		if(!$str) return false;
        $unicode = array(
  			'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
            'd'=>array('đ'),
            'D'=>array('Đ'),
            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
            'i'=>array('í','ì','ỉ','ĩ','ị'),
            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
            '-'=>array(' ')
        );

        foreach($unicode as $nonUnicode=>$uni){
        	foreach($uni as $value)
        	$str = str_replace($value,$nonUnicode,$str);
        }
		return $str;
	}

	function changeTitle($str) {
		$str = trim($str);
		if($str == "") return "";
		$str = str_replace('""', '', $str);
		$str = str_replace("'", '', $str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str, MB_CASE_LOWER,'utf-8');
		$str = str_replace(' ', '-', $str);
		return $str;
	}

	//De quy dropdown cate



	function cate_parent ($data,$parent_id = 0,$str="---|",$select=0) {
		foreach ($data as $val) {
			$id = $val["id"];
			$name = $val["name"];
			if ($val["parent_id"] == $parent_id) {
				if ($select != 0 && $id == $select) {
					echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
				} else {
					echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
				}
				cate_parent ($data,$id,$str." ---|",$select);
			}
		}
	}


	function post_type($data,$parent_id = 0,$str="---|",$select=0	) {
		foreach ($data as $val) {
			$id = $val["id"];
			$name = $val["name"];
			if ($val["parent_id"] == $parent_id) {
				if ($select != 0 && $id == $select) {
					echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
				} else {
					echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
				}
				post_type ($data,$id,$str." ---|",$select);
			}
		}
	}
?>
