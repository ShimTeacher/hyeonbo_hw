<?php


function create_jwt_contents($user_id, $jwt_id)
{
	$time = 60;
	return array(
		"uid" => $jwt_id,
		"user_id" => $user_id,
		"expired_time" => strtotime("+ $time min"),
	);
}
function make_email($str)
{
	$strlen         = mb_strlen($str, 'utf-8');
	$mask_str       = "*";
	$return_str     = "";

	//전자우편(E-mail)	앞 3자리를 제외한 ID부분 나머지 영역	abc*****@abc.com
	$explode_email         = explode( '@', $str );
	$email_len = mb_strlen($explode_email[0], 'utf-8');
	$strCut = 3;
	$strMaskingCut = $email_len - $strCut;
	$explode_email[0]      = mb_substr($str, 0, $strCut);
	$explode_email[0]      .= $strMaskingCut <= 0 ? '' : str_repeat($mask_str, ($strlen >= 6 ? $strCut : $strMaskingCut ));
	$return_str             = implode( '@', $explode_email );


	return $return_str;
}

function make_name($str)
{
	$strlen         = mb_strlen($str, 'utf-8');
	$mask_str       = "*";
	$return_str     = "";

	$pattern = '/([\xEA-\xED][\x80-\xBF]{2})+/';
	preg_match_all($pattern, $str, $match);
	$ko_str             = implode('', $match[0]);
	if($ko_str == $str) {
		## 한글 경우
		if( 3 > $strlen ) {
			$return_str     = mb_substr($str, 0, 1) . $mask_str;
		}else  {
			$return_str     = mb_substr($str, 0, 1) . str_repeat($mask_str, $strlen - 2 ) . mb_substr($str, -1) ;
		}
	}else {
		## 한글 이외의 경우
		$return_str         = mb_substr($str, 0, 2) . str_repeat($mask_str, $strlen - 2 );
	}

	return $return_str;
}


function make_phone($str)
{
	$strlen         = mb_strlen($str, 'utf-8');
	$mask_str       = "*";
	$return_str     = "";

	//전화번호/휴대전화번호	앞 3자리, 뒤 4자리를 제외한 나머지 영역	"010****1234
	$str = preg_replace("/[^0-9]*/s", "", $str);
	$strlen = mb_strlen($str, 'utf-8');
	$strCut = 3;
	$strMaskingCut = $strlen - $strCut;
	$return_str = mb_substr($str, 0, ($strlen >= $strCut ? $strCut : $strlen));
//                이전코드
//                $return_str             .= $strMaskingCut <= 0 ? '' : str_repeat($mask_str, ($strlen >= 10 ? 7 : $strMaskingCut ));
//                $return_str             .= mb_substr($str, -4, ($strlen <= 10 ? 0 : ($strlen - 10))) ;
	$strCut = $strlen > 10 ? 4 : $strCut;
	$strMaskingCut = $strMaskingCut - $strCut;
	$return_str .= $strMaskingCut <= 0 ? '' : str_repeat($mask_str, $strCut);
	return $return_str .= mb_substr($str, -4, ($strlen <= 9 ? 0 : $strMaskingCut));
}


function GET_HEADER_DATA()
{
	$CI =& get_instance();
	$headers = $CI->input->request_headers(true);
	$authorization = @$headers['Authorization'] ?: @$headers['authorization'];
	$access_token = $authorization;
	if ($authorization) {
		$splitter = explode(' ', $authorization);
		if (@$splitter[1]) {
			$auth_type = $splitter[0];
			$access_token = $splitter[1];
		}
	}
	return $access_token;
}
