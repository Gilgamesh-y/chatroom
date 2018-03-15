/**
* create_time 2018/02/04 00:22
* 提交评论
*/
function reply_submit(obj,pid=false)
{
    var data = $(obj).serialize();
    var load;
    var validate = true;
    if (pid) {
    	data = data + '&pid=' + pid;
    }
    var reg_email = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
    var reg_url = new RegExp("[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?");
    $.each($(obj).serializeArray(), function() {
		if (this.name == 'email') {
			let email = this.value;
			if (!reg_email.test(email)) {
				layer.msg('邮箱格式不正确',{icon: 5,time:1000});
				validate = false;
			}
		}
		if (this.name == 'url') {
			let url = this.value;
			if (!reg_url.test(url)) {
				layer.msg('网站格式不正确',{icon: 5,time:1000});
				validate = false;
			}
		}
    });
    if (validate === true) {
    	$.ajax({
	    	url: '/index/reply_submit',
	    	data: data,
	    	type: 'post',
	    	dataType: 'json',
	    	beforeSend: function() {
	    		$('button').attr({disabled: "disabled"});
				load = layer.load(1, {shade: [0.1,'#fff']}); 
			},
			success: function(data) {
				layer.close(load);
				if (data.code == 2000) {
					layer.msg(data.msg,{icon: 6,time:1000});
				} else {
					layer.msg(data.msg,{icon: 5,time:1000});
				}
				$("button").removeAttr("disabled");
			}
	    })
    }
}

/**
* create_time 2018/02/23 13:05
* 获取评论
*/
function reply_get(id)
{
	$.ajax({
		url: '/index/reply_get/'+id,
		type: 'get',
		dataType: 'json',
		success: function(data) {
			var date = new Date();
			for (let i = 0; i < data.msg.total; i++) {
				date.setTime(data.msg.data[i].create_time * 1000);
				var qq = /\d+/;
	            var qq_img = qq.exec(data.msg.data[i].email);
	            //若邮箱为纯数字
	            if (qq_img) {
	                img = 'https://q.qlogo.cn/g?b=qq&nk='+qq_img+'@qq.com&s=100';
	            }
	            else {
	                img = 'http://www.gravatar.com/avatar/'+md5(data.msg.data[i].email)+'';
	            }
	            $('#replyList').append('<div class="col-lg-8 col-lg-offset-2 reply-line"><div class="col-lg-12"><div class="row panel-group"><div class="col-lg-12"><a href="'+data.msg.data[i].url+'"><img class="img-circle pull-left" width="50px" height="50px" src="'+img+'" /></a><h3 class="col-lg-9" style="margin: 0 0 5px"><a class="reply_name'+data.msg.data[i].id+'" href="'+data.msg.data[i].url+'">'+data.msg.data[i].name+'</a></h3><div class="pull-right"><button type="button" class="btn btn-default btn-xs reset-btn" onclick="reply_person('+data.msg.data[i].id+')">Reply</button></div><div class="col-lg-10"><span class="fa fa-clock-o" style="margin-right: 10px;"> 发表于 '+date.toLocaleString()+' </span></div></div></div><div class="row"><div class="col-lg-12"><p class="panel-group">'+data.msg.data[i].reply_info+'</p></div></div></div></div><div class="col-lg-8 col-lg-offset-2 panel-group" style="border: 1px solid #ccc;height: 1px;border-radius: 50%;"></div>');
			}
		}
	})
}

/**
* create_time 2018/02/25
* 回复某人
*/
function reply_person(id)
{
	var con = $(".reply_name"+id).text();
	$(".reply-box").val("@"+con+"  ");
}