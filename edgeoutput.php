<?php
require_once("../../config.php");
require_once("ucinetlib.php");
$newid= $_POST['ucinet_Data'];
$arr = ucinet_show_course_dots($newid);
$dots=ucinet_show_course_name_dots($newid);
$conns=array();
for($i=0;$i<count($dots)+1;$i++)
{
	$conns[$i]=array();
	if($i==0)
	{
		$conns[$i][]="ID";
		for($j=0;$j<count($dots);$j++)
		{
			$conns[$i][]=$dots[$j];
			}
	}
	else
	{
		$conns[$i][]=$dots[$i-1];
		for($k=0;$k<count($dots);$k++)
		{
			if(ucinet_check_conn($dots[$k],$conns[$i][0],$arr)==1)
			{
				$conns[$i][$k+1]=1;
				}
				else
				{
					$conns[$i][$k+1]=0;
					}
			}
		
		}
}
   header('Content-Type: application/vnd.ms-excel');  
   header('Content-Disposition: attachment;filename="ucinet_egdes_data.csv"');  
   header('Cache-Control: max-age=0');
for($i=1;$i<count($conns);$i++)
{
	$conns[0][$i]=ucinet_show_dot_name($conns[0][$i]);
	}
for($i=1;$i<count($conns);$i++)
{
	$conns[$i][0]=ucinet_show_dot_name($conns[$i][0]);
	}
for($i=0;$i<count($conns);$i++)
{
	for($j=0;$j<count($conns[$i]);$j++)
	{
		echo $conns[$i][$j];
		echo ",";
		}
	echo "\r\n";
	}	
