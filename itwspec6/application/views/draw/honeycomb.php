<center><h1>Honeycomb</h1></center>
<br>
<?php
	$iterator=0;
	$str1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp; ";
	$str2 = "&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;* ";
	$str3 = "&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$str4 = "&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$str5 = "&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;* ";
	$str6 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;";
	$strToApp1 = $str1;
	$strToApp2 = $str2;
	$strToApp3 = $str3;
	$strToApp4 = $str4;
	$strToApp5 = $str5;
	$strToApp6 = $str6;
	for($i = 0;$i<$col-1;$i++){
		$str1 = $str1.$strToApp1;
		$str2 = $str2.$strToApp2;
		$str3 = $str3.$strToApp3;
		$str4 = $str4.$strToApp4;
		$str5 = $str5.$strToApp5;
		$str6 = $str6.$strToApp6;
	}
	for($j=0;$j<$row;$j++){
		echo $str1."<br>";
		echo $str2."<br>";
		echo $str3."&nbsp;&nbsp;*<br>";
		echo $str4."&nbsp;&nbsp;*<br>";
		echo $str5."<br>";
		$iterator = $i;
	}
		echo $str6;
?>




