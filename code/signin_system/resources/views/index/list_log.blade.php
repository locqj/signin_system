@extends('index.layouts.nav')

@section('body')

<div class="mui-content-padded">
<h5 class="mui-content-padded" style="margin: 35px 10px 15px 10px;">已有打卡項目</h5>
<ul id="OA_task_1" class="mui-table-view">
	<li class="mui-table-view-cell">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red">删除</a>
		</div>
		<div class="mui-slider-handle">
			早晨打卡
		</div>
	</li>
	<li class="mui-table-view-cell">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red">删除</a>
		</div>
		<div class="mui-slider-handle">
			早晨打卡
		</div>
	</li>
	<li class="mui-table-view-cell">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red">删除</a>
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
<script>
	mui.init();
	(function($) {
		$('#OA_task_1').on('tap', '.mui-btn', function(event) {
			var elem = this;
			var li = elem.parentNode.parentNode;
			var btnArray = ['确认', '取消'];
			mui.confirm('确认删除该条记录？', 'Hello MUI', btnArray, function(e) {
				console.log(e.index);
				if (e.index == 0) {
					window.location.reload();

					//li.parentNode.removeChild(li);
				} else {
					window.location.reload();
					// setTimeout(function() {
					// 	$.swipeoutClose(li);
					// }, 0);
				}
			});
		});
	})(mui);
</script>
@endsection