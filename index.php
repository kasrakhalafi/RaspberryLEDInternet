<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<meta name="viewport" content="width=device-width" />
<title>WIFI Controlled LED</title>
</head>
       <body>
       <center><b><font size = '20'>Control LED:</b>
         <form method="get" action="index.php">
                 <input type="submit" style = "font-size: 16 pt" value="OFF" name="off">
                 <input type="submit" style = "font-size: 16 pt" value="ON" name="on">
    <input type="submit" style = "font-size: 16 pt" value="BLINK" name="blink">
         </form>


<?php

$myfile = fopen("voltagefile.txt", "r") or die("Unable to open file!");
        $voltage = fread($myfile,filesize("voltagefile.txt"));
        fclose($myfile);
        echo "I AM: $voltage ";


$voltfile = fopen("voltagefile.txt", "w") or die("Unable to open file!");
$firstname = htmlspecialchars($_POST["firstname"]);
$txt1 = $firstname;
		fwrite($voltfile, $txt1);
		fclose($voltfile);



  if(isset($_GET['off']))
  {
		echo "LED is off";
    echo $_GET['data'] ;
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "0\n";
		fwrite($myfile, $txt);
		fclose($myfile);

         }
	else if(isset($_GET['on']))
	{
    echo $_GET['data'] ;
		echo "LED is on";
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "1\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	}
      else if(isset($_GET['data']))
       {
		$var= $_GET['data'] ;
		echo $var;
        $myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
        $reading = fread($myfile,filesize("newfile.txt"));
        fclose($myfile);
        echo "THISISOURS: $reading and ";
        }
	else if(isset($_GET['blink']))
	{
         $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		 $txt = "2\n";
		 fwrite($myfile, $txt);
		 fclose($myfile);
		 echo "LED is blinking";
	}

        ?>

   </center></font>
   </body>
 </html>
