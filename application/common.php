<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Db;

//设置最大显示字数
function subtext($text, $length)
{
	if(mb_strlen($text, 'utf8') > $length) {
		return mb_substr($text,0,$length,'utf8').'…';
	}
	return $text;

}
function replyNum($id)
{
    $res = Db::table('reply')->alias('r')->where('article_id', $id)->count();
    return $res;
}
function category($id)
{
	$res = Db::table('article_category')->where('id', $id)->value('name');
	return $res;
}
function headImg($email)
{
	preg_match('/([\s\S]+?)@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})/i', $email, $validate);
	if (empty($validate[1])) {
		return '/static/picture/test.png';
	}
	if (preg_match('/\d+/i', $validate[1], $result)) {
		return 'https://q.qlogo.cn/g?b=qq&nk='.$result[0].'@qq.com&s=100';
	}else {
		return 'http://www.gravatar.com/avatar/'.md5($email).'';
	}
}