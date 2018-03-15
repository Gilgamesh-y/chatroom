/**
* create_time 2018/02/27
* 获取psn信息
*/
function get_psn()
{
	$.ajax({
		url: '/curl/psn_get',
		type: 'get',
		dataType: 'json',
		success: function(data) {
			console.log(data);
			var length = data.online.list.length;
			var trophies = parseInt(data.userData.trophies['bronze']) + parseInt(data.userData.trophies['gold']) + parseInt(data.userData.trophies['platinum']) + parseInt(data.userData.trophies['silver']);
			$('.user-info').append('<div class="row panel-group"><div class="col-lg-2 text-right"><img width="80" height="80" src="https:'+data.userData['avatarUrl']+'" /></div><div class="col-lg-10"><h1 style="margin-top: 8px;">'+data.userData['handle']+'</h1></div></div><div class="row"><div class="col-lg-12 panel-group"><div class="col-lg-2 col-xs-4"><h5 class="text-center">LEVEL</h5><h5 class="text-center user-num">'+data.userData['curLevel']+'</h5></div><div class="col-lg-2 col-xs-4"><h5 class="text-center">TROPHIES</h5><h5 class="text-center user-num">'+trophies+'</h5></div><div class="col-lg-2 col-xs-4"><h5 class="text-center">BRONZE</h5><h5 class="text-center user-num">'+data.userData.trophies['bronze']+'<img src="http://oxx6jt6h8.bkt.clouddn.com/bronze.png" /></h5></div><div class="col-lg-2 col-xs-4"><h5 class="text-center">SILVER</h5><h5 class="text-center user-num">'+data.userData.trophies['silver']+'<img src="http://oxx6jt6h8.bkt.clouddn.com/silver.png" /></h5></div><div class="col-lg-2 col-xs-4"><h5 class="text-center">GOLD</h5><h5 class="text-center user-num">'+data.userData.trophies['gold']+'<img src="http://oxx6jt6h8.bkt.clouddn.com/gold.png" /></h5></div><div class="col-lg-2 col-xs-4"><h5 class="text-center">PLATINUM</h5><h5 class="text-center user-num">'+data.userData.trophies['platinum']+'<img src="http://oxx6jt6h8.bkt.clouddn.com/platinum.png" /></h5></div></div><div class="col-lg-12"><span class="col-lg-12">LEVEL'+data.userData['curLevel']+'</span><div class="col-lg-11"><div class="progress" style="height: 8px;margin-top: 6px;"><div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '+data.userData['progress']+'%;"></div></div></div><span class="col-lg-1">'+data.userData['progress']+'%</span></div></div>');
			for (let i=0; i < length; i++) {
				console.log(data.online.list[i]);
				$('.game-list').append('<div class="game-box"><div class="game-img"><img src="https:'+data.online.list[i]['imgUrl']+'" /></div><div class="game-type"><h5>'+data.online.list[i]['platform']+'</h5><h5>'+data.online.list[i]['title']+'</h5></div><div class="game-info"><ul class="game-trophies"><li><div><img src="https://www.playstation.com/en-us/etc/designs/pdc/clientlibs_base/images/mypdc/bronze.png" /></div><h5>'+data.online.list[i].trophies['bronze']+'</h5></li><li><div><img src="https://www.playstation.com/en-us/etc/designs/pdc/clientlibs_base/images/mypdc/silver.png" /></div><h5>'+data.online.list[i].trophies['silver']+'</h5></li><li><div><img src="https://www.playstation.com/en-us/etc/designs/pdc/clientlibs_base/images/mypdc/gold.png" /></div><h5>'+data.online.list[i].trophies['gold']+'</h5></li><li><div><img src="https://www.playstation.com/en-us/etc/designs/pdc/clientlibs_base/images/mypdc/platinum.png" /></div><h5>'+data.online.list[i].trophies['platinum']+'</h5></li></ul><ul class="game-progress"><li class="progress-img"><div class="progress" style="height: 8px;margin-top: 6px;"><div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: '+data.online.list[i].progress+'%;"></div></div></li><li class="progress-num"><span>'+data.online.list[i].progress+'%</span></li></ul></div></div>');
			}
		}
	})
}