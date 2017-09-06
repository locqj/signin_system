@extends('index.layouts.nav')

@section('body')
<style>
	
	.mui-plus .plus{
		display: inline;
	}
	
	.plus{
		display: none;
	}
	
	#topPopover {
		position: fixed;
		top: 16px;
		right: 6px;
	}
	#topPopover .mui-popover-arrow {
		left: auto;
		right: 6px;
	}
	p {
		text-indent: 22px;
	}
	span.mui-icon {
		font-size: 14px;
		color: #007aff;
		margin-left: -15px;
		padding-right: 10px;
	}
	.mui-popover {
		height: 300px;
	}
	.mui-content {
		padding: 10px;
	}
</style>
<div class="mui-card">
<div class="title">操作</div>
	<a type="button" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined" id="addmoon" style="padding:6px 0px" >新建心情</a>
<div class="title">已有心情</div>
<h5 class="mui-content-padded">右滑删除该心情</h5>

<ul id="OA_task_1" class="mui-table-view">
	<li class="mui-table-view-cell clone_block">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red btn-del">删除</a>
		</div>
		<div class="mui-slider-handle">
			<a class="list_action"  style="color: black; display: block;">
				心情一般
			</a>
		</div>
	</li>
</ul>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>
<script type="text/javascript">
	document.getElementById("addmoon").addEventListener('tap', function(e) {
		e.detail.gesture.preventDefault(); //修复iOS 8.x平台存在的bug，使用plus.nativeUI.prompt会造成输入法闪一下又没了
		var btnArray = ['取消', '确定'];
		mui.prompt('请输入你的心情','', '设置心情', btnArray, function(e) {
			if (e.index == 1) {
				var name = e.value;
				if (!name) {
					mui.toast('心情不得为空');
				} else {
					mui.ajax('/api/index/addmoon',{
						data:{
							name:name
						},
						dataType:'json',//服务器返回json格式数据
						type:'post',//HTTP请求类型
						timeout:10000,//超时时间设置为10秒；
						headers:{'Content-Type':'application/json'},	              
						success:function(data){
							if (data.code == 201) {
								window.location.reload();
							} else {
								mui.toast(data.msg);
							}
						},
						error:function(xhr,type,errorThrown){
							//异常处理；
							console.log(type);
						}
					});
				}
			}
		})
	});
</script>
<script>
	$.get('/api/index/listmoonperson', function(data) {
		if(data.code == 200) {
			var clone_block = $('.clone_block');
            $.each(data.data, function(key, val) {
                var clo = clone_block.clone(true);
                $(clo).removeClass('clone_block');
                $(clo).children('div').eq(1).children('a').text(val.name); //賦值給前端展示
                $(clo).children('div').eq(0).children('a').attr('value', val.id); //賦值給前端展示
                $(clo).show();
                $('#OA_task_1').append(clo);
            });
		}
	});
	/*刪除按鈕*/
	$('.btn-del').click(function() {
		var id = $(this).attr('value');
		var tag = $(this).parent().parent();
		$.get('/api/index/delmoon?id='+id, function(data) {
			if(data.code == 204) {
				tag.hide();
			}
		});
		
	});


	
	
</script>
@endsection