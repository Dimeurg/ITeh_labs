<head><script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script></head>

<html><body>

<form action = "lab4.php" method="get">
input filename<input id="test" type="text", name="filename" value="file1.txt"><br>
open<input type="radio", name="act" value="open"><br>
rewrite<input type="radio", name="act" value = "rewrite"><br>
close<input type="radio", name="act" value = "close"><br>
go<input type = "submit"><br>
<input id = "idtext" type="text" , name="textb" value = ""><br>
</form>

</body></html>
<?php

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

function changeText( $data ){
  echo '<script>';
  echo "$('#idtext').val(". json_encode( $data ) .")";
  echo '</script>';
}

$filename = @$_GET["filename"];
$act = @$_GET["act"];
$textb = @$_GET["textb"];
console_log($filename);
console_log($act);
console_log($textb);

if($act !== null)
{	
	if(!strcmp($act, "open"))
	{	
		$file_h = @fopen($filename, "r");
		if(!$file_h)
		{
			echo("something went wrong");
		}
		else{
			$text = file_get_contents($filename);
			console_log($text);
			changeText($text);
			echo("niceee");	
		}
	}
	
	if(!strcmp($act, "rewrite"))
	{	
		$file_h = @fopen($filename, "w+");
		if($file_h)
		{
			fwrite($file_h, $textb);
		}
		
		else 
			echo("you need open file");	
	}
	
	if(!strcmp($act, "close"))
	{
		$file_h = @fopen($filename, "r");
		if($file_h)
		{
			fclose($file_h);
			echo("file closed");	
		}
		
		else
			echo("file is already closed");
	}
}
?>
