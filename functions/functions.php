<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
function clear_string($cl_str)
{
    
 $cl_str = strip_tags($cl_str);
 $cl_str = mysql_real_escape_string($cl_str);
 $cl_str = trim($cl_str);  
    
  return $cl_str;              
}

function fungenpass()
{
    $number = 7;

    $arr = array('a','b','c','d','e','f',

                 'g','h','i','j','k','l',

                 'm','n','o','p','q','r','s',

                 't','u','v','w','x','y','z',

                 '1','2','3','4','5','6',

                 '7','8','9','0');

    // Генерируем пароль

    $pass = "";

    for($i = 0; $i < $number; $i++)

    {

      // Вычисляем случайный индекс массива

      $index = rand(0, count($arr) - 1);

      $pass .= $arr[$index];

    }

return $pass;
}

function send_mail($from,$to,$subject,$body)
{
	$charset = 'utf-8';
	mb_language("ru");
	$headers  = "MIME-Version: 1.0 \n" ;
	$headers .= "From: <".$from."> \n";
	$headers .= "Reply-To: <".$from."> \n";
	$headers .= "Content-Type: text/html; charset=$charset \n";
	
	$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

	mail($to,$subject,$body,$headers);
}

function group_numerals($int){
    
       switch (strlen($int)) {

	    case '4':
        
        $price = substr($int,0,1).' '.substr($int,1,4);

	    break;

	    case '5':
        
        $price = substr($int,0,2).' '.substr($int,2,5);

	    break;

	    case '6':
        
        $price = substr($int,0,3).' '.substr($int,3,6);

	    break;

	    case '7':
        
        $price = substr($int,0,1).' '.substr($int,1,3).' '.substr($int,4,7);

	    break;
			   
		case '8':
        
        $price = substr($int,0,2).' '.substr($int,2,3).' '.substr($int,5,8);

	    break;
			   
		case '9':
        
        $price = substr($int,0,3).' '.substr($int,3,3).' '.substr($int,6,9);

	    break;	   
        
	    default:
        
        $price = $int;
        
	    break;

	}
    return $price; 
}
function ftranslite($name){

 $name=preg_replace("/[\s+\.\,]/","-",$name);
 $name=preg_replace("/[\"\'\!\?\(\)\:\$\%]/","",$name); 

 static $trans= array(
 'ա'=>'a', 'բ'=>'b', 'գ'=>'g', 'դ'=>'d', 'ե'=>'e', 'զ'=>'z', 'է'=>'e', 'ը'=>'y',
 'թ'=>'t', 'ժ'=>'j', 'ի'=>'i', 'լ'=>'l', 'խ'=>'x', 'ծ'=>'ts', 'կ'=>'k', 'հ'=>'h',
 'ձ'=>'dz', 'ղ'=>'x', 'ճ'=>'ch', 'մ'=>'m', 'յ'=>'y', 'ն'=>'n', 'շ'=>'sh', 'ո'=>'o', 'չ'=>'ch', 'պ'=>'p', 'ջ'=>'j', 'ռ'=>'r', 'ս'=>'s', 'վ'=>'v','տ'=>'t', 'ր'=>'r','ց'=>'c','ու'=>'u', 'փ'=>'p','ք'=>'q','և'=>'ev', 'օ'=>'o','ֆ'=>'f',
'Ա'=>'A',
 'Բ'=>'B', 'Գ'=>'G', 'Դ'=>'D', 'Ե'=>'E', 'Զ'=>'Z', 'Է'=>'E', 'Ը'=>'Y', 'Թ'=>'T',
 'Ժ'=>'J', 'Ի'=>'I', 'Լ'=>'L', 'Խ'=>'X', 'Ծ'=>'TS', 'Կ'=>'K', 'Հ'=>'H', 'Ձ'=>'DZ',
 'Ղ'=>'X', 'Ճ'=>'CH', 'Մ'=>'M', 'Յ'=>'Y', 'Ն'=>'N', 'Շ'=>'SH', 'Ո'=>"O", 'Չ'=>"CH", 'Պ'=>'P', 'Ջ'=>'J', 'Ռ'=>'R', 'Ս'=>'S', 'Վ'=>'V', 'Տ'=>'T', 'Ր'=>"R", 'Ց'=>"C", 'ՈՒ'=>'U', 'Փ'=>'P', 'Ք'=>'Q', 'ԵՎ'=>'EV', 'Օ'=>'O', 'Ֆ'=>'F'
 );
 
  $strstring = strtr($name, $trans) ;
	
 return strtolower($strstring) ;
 }

?>