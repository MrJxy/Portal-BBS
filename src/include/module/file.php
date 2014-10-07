<?php

define("USERFILE","./userfile/");

//功能：保存文件
//需要变量：id（用户的或帖子的）、文件名、文件类型、文件内容
//$file_type=1,头像；$file_type=2,附件
function save_file($id,$file_name,$file_type,$file_content)
{
	$file_id=md5(time());//生成文件的md5
	//数据库检验$file_id是否重复，若重复则重新生成，最多重新生成50次
	//数据库写入($id,$file_id);
	if($file_type==1){
		$a=resetUserPicture($id,$file_id);
		if($a==false)		
			return false;//保存失败
	}
	
	$fp=fopen(USERFILE.$file_id,"wb");
	fwrite($fp,$file_content);
	fclose($fp);
	return true;//保存成功
}

//功能：读取文件
//需要变量：文件md5、文件内容
//文件内容保存在$file_content中
function load_file($file_id,&$file_content)
{
	if(file_exists(USERFILE.$file_id)==false)
		return -1;//表示文件不存在
	else{
		$fp=fopen(USERFILE.$file_id,"rb");
		$file_content=fread($fp,filesize($file_id));
		fclose($fp);
		return 1;//读取成功
	}
}

//功能：删除文件
//需要变量：文件md5
function remove_file($file_id)
{
	if(file_exists(USERFILE.$file_id)==false)
		return -1;//表示文件不存在
	else{
		unlink(USERFILE.$file_id);
		return 1;//删除成功
	}
}
?>