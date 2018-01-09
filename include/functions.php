<?php


function cleanInput($text)
{
	//strip tags
	$text = strip_tags($text);
	$text = trim($text);
	return $text;
}

function Is_email($user)
{
	//If the username input string is an e-mail, return true 
	if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}
function time_stamp($session_time)
{

	$time_difference = time() - $session_time ;
	$seconds = $time_difference ;
	$minutes = round($time_difference / 60 );
	$hours = round($time_difference / 3600 );
	$days = round($time_difference / 86400 );
	$weeks = round($time_difference / 604800 );
	$months = round($time_difference / 2419200 );
	$years = round($time_difference / 29030400 );

	if($seconds <= 60)
	{
		echo"$seconds seconds ago";
}
else if($minutes <=60)
{
	if($minutes==1)
	{
		echo"one minute ago";
	}
	else
	{
		echo"$minutes minutes ago";
	}
	}
	else if($hours <=24)
	{
	if($hours==1)
	{
	echo"one hour ago";
   }
	else
	{
	echo"$hours hours ago";
	}
	}
	else if($days <=7)
	{
	if($days==1)
	{
	echo"one day ago";
   }
			else
			{
			echo"$days days ago";
			}



	}
	else if($weeks <=4)
	{
	if($weeks==1)
	{
	echo"one week ago";
   }
			else
			{
			echo"$weeks weeks ago";
			}
			}
			else if($months <=12)
			{
				if($months==1)
				{
					echo"one month ago";
				}
				else
				{
					echo"$months months ago";
			}

			 
}

else
	{
	if($years==1)
		{
		echo"one year ago";
}
else
{
echo"$years years ago";
}


}

}


function checkValues($value)
{
	// Use this function on all those values where you want to check for both sql injection and cross site scripting
	//Trim the value
	$value = trim($value);
		
	// Stripslashes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}

	// Convert all &lt;, &gt; etc. to normal html and then strip these
	$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));

	// Strip HTML Tags
	$value = strip_tags($value);

	// Quote the value
	$value = mysql_real_escape_string($value);
	$value = htmlspecialchars ($value);
	return $value;

}

function clickable_link($text = '')
{
	$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
	$ret = ' ' . $text;
	$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);

	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
	$ret = substr($ret, 1);
	return $ret;
}