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
	html,
	body,
	.mui-content {
		height: 0px;
		margin: 0px;
		background-color: #efeff4;
	}
	h5.mui-content-padded {
		margin-left: 3px;
		margin-top: 20px !important;
	}
	h5.mui-content-padded:first-child {
		margin-top: 12px !important;
	}
	.mui-btn {
		font-size: 16px;
		padding: 8px;
		margin: 3px;
	}
	.ui-alert {
		text-align: center;
		padding: 20px 10px;
		font-size: 16px;
	}
	* {
		-webkit-touch-callout: none;
		-webkit-user-select: none;
	}
</style>
<div class="mui-card">
<div class="title">操作</div>

	<ul class="mui-table-view">
		<li class="mui-table-view-cell mui-collapse adddays">
			<a class="mui-navigate-right" href="#">新建倒计时</a>
			<div class="mui-collapse-content">
				<form class="mui-input-group">
					<div class="mui-input-row">
						<label>设定名称</label>
						<input type="text" id="days_name" class="mui-input-clear">
					</div>

					<h5>设定设定结束日期</h5>
					<button id='demo2' data-options='{"type":"date","beginYear":2017,"endYear":2020}' class="btn mui-btn mui-btn-block">选择日期 ...</button>
					<div id='result' class="ui-alert"></div>
					<div id='date_time' style="display: none;"></div>
					<div class="mui-button-row">
						<button class="mui-btn mui-btn-primary btn_sub" type="button">确认</button>&nbsp;&nbsp;
						<button class="mui-btn mui-btn-primary btn_cancel" type="button">取消</button>
					</div>
				</form>
			</div>
		</li>
	</ul>

<div class="title">已有任务</div>
<h5 class="mui-content-padded">右滑删除该任务</h5>

<ul id="OA_task_1" class="mui-table-view">
	<li class="mui-table-view-cell clone_block">
		<div class="mui-slider-right mui-disabled">
			<a class="mui-btn mui-btn-red btn-del">删除</a>
		</div>
		<div class="mui-slider-handle">
			<a class="list_action"  style="color: black; display: block;">
				<span style="float: left;">t</span><span style="float: right;">t</span>
			</a>
		</div>
	</li>
</ul>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>
<script type="text/javascript">
</script>
<script>
	$.get('/api/index/getmatter', function(data) {
		if(data.code == 200) {
			var clone_block = $('.clone_block');
            $.each(data.data, function(key, val) {
                var clo = clone_block.clone(true);
                $(clo).removeClass('clone_block');
                $(clo).children('div').eq(1).children('a').children('span').eq(0).text(val.name);
                var right_msg = val.daymatter+'天';
                $(clo).children('div').eq(1).children('a').children('span').eq(1).text(right_msg);
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
		$.get('/api/index/delmatter?id='+id, function(data) {
			if(data.code == 204) {
				tag.hide();
			}
		});
		
	});

	$('.btn_sub').click(function() {
		var name = $('#days_name').val();
		var date = $('#date_time').text();
		if (!name) {
			mui.toast('名称不得为空！');
		} else if (!date) {
			mui.toast('倒数日期不得为空！');
		} else {
			$.post('/api/index/addmatter', {
				name: name,
				date: date
			}, function(data) {
				if (data.code == 200) {
					window.location.reload();
				}
			});
		}
	})
	
	
</script>
<script>
	(function($) {
		$.init();
		var result = $('#result')[0];
		var date_time = $('#date_time')[0];
		var btns = $('.btn');
		btns.each(function(i, btn) {
			btn.addEventListener('tap', function() {
				var _self = this;
				if(_self.picker) {
					_self.picker.show(function (rs) {
						result.innerText = '选择结果: ' + rs.text;
						date_time.innerText = rs.text;
						_self.picker.dispose();
						_self.picker = null;
					});
				} else {
					var optionsJson = this.getAttribute('data-options') || '{}';
					var options = JSON.parse(optionsJson);
					var id = this.getAttribute('id');
					/*
					 * 首次显示时实例化组件
					 * 示例为了简洁，将 options 放在了按钮的 dom 上
					 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
					 */
					_self.picker = new $.DtPicker(options);
					_self.picker.show(function(rs) {
						/*
						 * rs.value 拼合后的 value
						 * rs.text 拼合后的 text
						 * rs.y 年，可以通过 rs.y.vaue 和 rs.y.text 获取值和文本
						 * rs.m 月，用法同年
						 * rs.d 日，用法同年
						 * rs.h 时，用法同年
						 * rs.i 分（minutes 的第二个字母），用法同年
						 */
						result.innerText = '选择结果: ' + rs.text;
						date_time.innerText = rs.text;
						/* 
						 * 返回 false 可以阻止选择框的关闭
						 * return false;
						 */
						/*
						 * 释放组件资源，释放后将将不能再操作组件
						 * 通常情况下，不需要示放组件，new DtPicker(options) 后，可以一直使用。
						 * 当前示例，因为内容较多，如不进行资原释放，在某些设备上会较慢。
						 * 所以每次用完便立即调用 dispose 进行释放，下次用时再创建新实例。
						 */
						_self.picker.dispose();
						_self.picker = null;
					});
				}
				
			}, false);
		});
	})(mui);
</script>
@endsection