@extends('index.layouts.nav')

@section('body')
<style>
	html,
	body,
	.mui-content {
		height: 0px;
		margin: 0px;
		background-color: #efeff4;
	}
	h5.mui-content-padded {
		margin-left: 0px !important;
		margin-top: 20px !important;
	}
	.mui-card {
		margin: 0px;
	}
</style>
<div class="mui-content-padded">
	<h5>项目详情</h5>
	<div class="mui-card">

	<form class="mui-input-group">

		<div class="mui-input-row">
			<label>打卡名称:</label>
			<input type="text"  value="{{ $data->name }}" data-input-clear="5" readonly="readonly">
		</div>
		<h5 class="mui-content-padded" style="padding: 0px 5px">默认设置为0，即为不需要有打卡时长约束</h5>
		<h5 class="mui-content-padded" style="padding: 0px 5px">单位时间为分钟</h5>

		<div class="mui-input-row">
			<label>打卡長度:</label>
				<input class="text" type="number" id="tag_length" value="{{ $data->time_length }}" />
		</div>
		<!--  -->
		<h5 class="mui-content-padded" style="padding: 0px 5px">每天打卡时段</h5>
		<ul class="mui-table-view mui-table-view-radio selecte_tag_time">
			<li class="mui-table-view-cell @if($data->result_start == null && $data->result_end == null)mui-selected @endif" value="0">
				<a class="mui-navigate-right">
					全天任何时段
				</a>
			</li>
			<li class="mui-table-view-cell @if($data->result_start != null && $data->result_end != null)mui-selected @endif" value="1">
				<a class="mui-navigate-right @if($data->result_start != null && $data->result_end != null)mui-selected @endif">
					规定时间段
				</a>
			</li>
		</ul>
		<div class="@if($data->result_start == null && $data->result_end == null)time_tag @endif">
			<div class="mui-content-padded">
				<button id="btn_start"  class="btn mui-btn mui-btn-block" disabled>开始时间</button>
				<div id='result_start' class="ui-alert"><center>{{ $data->result_start }}</center></div>
			</div>
			<div class="mui-content-padded">
				<button id="btn_end" class="btn mui-btn mui-btn-block" disabled>结束时间</button>
				<div id='result_end' class="ui-alert"><center>{{ $data->result_end }}</center></div>
			</div>
		</div>
		<!--  -->
		<h5 class="mui-content-padded" style="padding: 0px 5px">设置开始结束时间</h5>
		<ul class="mui-table-view mui-table-view-radio selecte_set_time">
			<li class="mui-table-view-cell @if($data->start_time == null && $data->end_time == null)mui-selected @endif" value="0">
				<a class="mui-navigate-right">
					不限制日期打卡
				</a>
			</li>
			<li class="mui-table-view-cell @if($data->start_time != null && $data->end_time != null)mui-selected @endif" value="1">
				<a class="mui-navigate-right">
					设置打卡开始，結束日期
				</a>
			</li>
		</ul>
		<div class="@if($data->start_time == null && $data->end_time == null)time_set @endif">
			<div class="mui-content-padded">
				<button id="btn_tag_start"  class="btn mui-btn mui-btn-block" disabled>开始时间</button>
				<div id='tag_start' class="ui-alert" ><center>{{ $data->start_time }}</center></div>
			</div>
			<div class="mui-content-padded">
				<button id="btn_tag_end"  class="btn mui-btn mui-btn-block" disabled>结束时间</button>
				<div id='tag_end' class="ui-alert"><center>{{ $data->end_time }}</center></div>
			</div>
		</div>
		<div class="mui-button-row " style="height: 64px">
			<button type="button" class="mui-btn mui-btn-danger mui-btn-block del">刪除</button>
		</div>
	</form>
	</div>
</div>

<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>
<script>
	$('.del').click(function() {
		var btnArray = ['否', '是'];
		mui.confirm('確定刪除項目？', '打卡系統', btnArray, function(e) {
			if (e.index == 1) {
				$.get('/api/index/delaction?id={{ $data->id }}', function(data) {
					if(data.code == 204) {
						window.location.href = data.data.link_url;
					}
				});
			}
		})
		
	})
</script>
@endsection