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
<div class="mui-content-padded">
<div class="title">操作</div>
	<a type="button" href="{{ url('index/addaction') }}" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined" style="padding:6px 0px" >新建项目</a>
<div class="title">已有打卡項目</div>
<h5 class="mui-content-padded">右滑删除该项目</h5>

<ul id="OA_task_1" class="mui-table-view">
	<li class="mui-table-view-cell clone_block">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red btn-del">删除</a>
		</div>
		<div class="mui-slider-handle">
			<a class="list_action" href="" style="color: black; display: block;">
				早晨打卡
			</a>
		</div>
	</li>
</ul>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

<script>
	$.get('/api/index/listaction', function(data) {
		if(data.code == 200) {
			var clone_block = $('.clone_block');
            $.each(data.data, function(key, val) {
                var clo = clone_block.clone(true);
                $(clo).removeClass('clone_block');
                $(clo).children('div').eq(1).children('a').text(val.name); //賦值給前端展示
                $(clo).children('div').eq(1).children('a').attr('href', '/index/actiondetails/'+val.code); //賦值給前端展示
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
		$.get('/api/index/delaction?id='+id, function(data) {
			if(data.code == 204) {
				tag.hide();
				mui,toast('删除成功');
			}
		});
		
	});


	
	
</script>
@endsection