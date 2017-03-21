<?php
function ucinet_show_course_dots($course)
{
	global $DB;
	if($discussions=$DB->get_records("forum_discussions",array("course"=>$course)))
	{
	$arr=array();
	$user_num=array();
	//$user_num[]=array("Source","Target");
	foreach($discussions as $discussion)
	{	
		if($posts=$DB->get_records("forum_posts",array("discussion"=>$discussion->id)))
		{
		$test=array();
		foreach($posts as $row)
		{	
			$leslie=$row->parent;
			if($leslie!=0)
			{
				$post=$DB->get_record("forum_posts",array("id"=>$leslie));
				if(($row->userid)!=($post->userid))
				{
					unset($test);
					$arr[]=$post->userid;	
					$test[]=$post->userid;
					$test[]=$row->userid;
					if(!ucinet_check($user_num,$test))
					{
						$user_num[]=$test;
						}		
				}
			}

		 }
	}
	}
  return $user_num;
	}
}


function ucinet_check($arr,$arr1)
{
	foreach($arr as $value)
	{
		if($value[0]==$arr1[0]&&$value[1]==$arr1[1])
		{
			return true;
			}
		}
	}
function ucinet_check_conn($num1,$num2,$arr)
{
	$label=array();
	$label[]=$num1;
	$label[]=$num2;
	$error=0;
	for($i=0;$i<count($arr);$i++)
	{
		if($label==$arr[$i])
		{
			$error=$error+1;
			}
		
		}
		return $error;
	}
function ucinet_show_dot_name($value)
{
	global $DB;
		$userinfo=$DB->get_record("user",array("id"=>$value));
		$username=$userinfo->lastname.$userinfo->firstname;
		//$username="ID".$userinfo->id;
		//$usersname =iconv('gb2312','utf-8',$username);
		$usersname = iconv('utf-8','gb2312',$username);   
	return $usersname;
	}
function ucinet_show_course_name_dots($course)
{
	global $DB;
	$arr=array();
	if($forums=$DB->get_records("forum_discussions",array("course"=>$course)))
	{
	foreach($forums as $forum)
	{	
		if($posts=$DB->get_records("forum_posts",array("discussion"=>$forum->id)))
		{
			foreach($posts as $row)
			{	
				$arr[]=$row->userid;
			 }
		}
	}
	}
    $arrs = array_unique($arr);
	$arrs = array_values($arrs);
	return $arrs;
}