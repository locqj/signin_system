@extends('index.layouts.nav')

@section('body')

<div class="mui-content-padded">
<h5 class="mui-content-padded" style="margin: 35px 10px 15px 10px;">已有打卡項目</h5>
<ul id="OA_task_1" class="mui-table-view">
	<li class="mui-table-view-cell clone_block">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red btn-del">删除</a>
		</div>
		<div class="mui-slider-handle">
			早晨打卡
		</div>
	</li>
</ul>
</div>
<h5 class="mui-content-padded" style="margin: 35px 10px 15px 10px;">Line</h5>
<div class="mui-content-padded">
	    <a type="button" class="mui-btn mui-btn-block" href="{{ url('index/addaction') }}">新建項目</a>

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
                $(clo).children('div').eq(1).text(val.name); //賦值給前端展示
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
			}
		});
	})
	
	
</script>
@endsection