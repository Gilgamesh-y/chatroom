/**
* create_time 2018/02/25
* 获取网易云个人信息
*/
function get_userinfo()
{
	var music_info = [];
	$.ajax({
		url: '/curl/music_get',
		type: 'get',
		async: false,
		dataType: 'json',
		success: function(data) {
			$(".userinfo").append('<div><img class="img-rounded" src="'+data.creator['avatarUrl']+'" width="80" height="80" style="float: left;" /></div><div class="col-lg-10"><h3 class="col-lg-3 text-center" style="margin: 0 0 5px"><a class="col-lg-12" href="">'+data.creator['nickname']+'</a></h3><div class="col-lg-12" style="border-top: 1px solid #ccc;height: 1px;border-radius: 49%;margin: 5px 0;"></div><div class="col-lg-12"><p><strong>'+data.creator['signature']+'</strong><br></p></div></div>');
			music_info = data.tracks;
		}
	});
	return music_info;
}