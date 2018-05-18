<?php
class hanshu{
function magic($str)
{
$str=trim($str);

//$str=addcslashes($str,">");

//return  htmlspecialchars($str);
$str=htmlspecialchars($str);
return $str;

}
}