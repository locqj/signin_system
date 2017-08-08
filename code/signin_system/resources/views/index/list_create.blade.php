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
	<h5>新建打卡項目</h5>
	<div class="mui-card">

	<form class="mui-input-group">

		<div class="mui-input-row">
			<label>打卡名稱:</label>
			<input type="text" class="mui-input-clear" id="tag_name" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
		</div>
		<h5 class="mui-content-padded" style="padding: 0px 5px">默認設置爲0，即爲不需要有打卡時長約束</h5>
		<h5 class="mui-content-padded" style="padding: 0px 5px">單位爲分鍾</h5>

		<div class="mui-input-row">
			<label>打卡長度:</label>
			<div class="mui-numbox">
				<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
				<input class="mui-input-numbox" type="number" id="tag_length" />
				<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
			</div>
		</div>
		<!--  -->
		<h5 class="mui-content-padded" style="padding: 0px 5px">設置每天打卡時段</h5>
		<ul class="mui-table-view mui-table-view-radio selecte_tag_time">
			<li class="mui-table-view-cell mui-selected" value="0">
				<a class="mui-navigate-right">
					默認全天任何時段
				</a>
			</li>
			<li class="mui-table-view-cell" value="1">
				<a class="mui-navigate-right">
					選擇時間段
				</a>
			</li>
		</ul>
		<div class="time_tag">
			<div class="mui-content-padded">
				<button id="btn_start" data-options="{&quot;type&quot;:&quot;time&quot;}" class="btn mui-btn mui-btn-block">開始時間</button>
				<div id='result_start' class="ui-alert"></div>
			</div>
			<div class="mui-content-padded">
				<button id="btn_end" data-options="{&quot;type&quot;:&quot;time&quot;}" class="btn mui-btn mui-btn-block">結束時間</button>
				<div id='result_end' class="ui-alert"></div>
			</div>
		</div>
		<!--  -->
		<h5 class="mui-content-padded" style="padding: 0px 5px">設置開始結束時間</h5>
		<ul class="mui-table-view mui-table-view-radio selecte_set_time">
			<li class="mui-table-view-cell mui-selected" value="0">
				<a class="mui-navigate-right">
					不限制日期長期打卡
				</a>
			</li>
			<li class="mui-table-view-cell" value="1">
				<a class="mui-navigate-right">
					設置打卡開始，結束日期
				</a>
			</li>
		</ul>
		<div class="time_set">
			<div class="mui-content-padded">
				<button id="btn_tag_start" data-options="{&quot;type&quot;:&quot;time&quot;}" class="btn mui-btn mui-btn-block">開始時間</button>
				<div id='tag_start' class="ui-alert"></div>
			</div>
			<div class="mui-content-padded">
				<button id="btn_tag_end" data-options="{&quot;type&quot;:&quot;time&quot;}" class="btn mui-btn mui-btn-block">結束時間</button>
				<div id='tag_end' class="ui-alert"></div>
			</div>
		</div>
		<div class="mui-button-row " style="height: 64px">
			<button type="button" id="sure_btn" class="mui-btn mui-btn-primary" onclick="btnSub();">确认</button>&nbsp;&nbsp;
			<button type="button" class="mui-btn mui-btn-danger" onclick="btnCancel();">取消</button>
		</div>
	</form>
	</div>
</div>

<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>
<script>

(function($) {
	$.init();

	var result_start = $('#result_start')[0];
	var result_end = $('#result_end')[0];
	var tag_start = $('#tag_start')[0];
	var tag_end = $('#tag_end')[0];

	var btn_start = $('#btn_start');
	btn_start.each(function(i, btn) {
		btn.addEventListener('tap', function() {
			var _self = this;
			if(_self.picker) {
				_self.picker.show(function (rs) {
					result_start.innerText =  rs.text;

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
					result_start.innerText =  rs.text;

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

	var btn_end = $('#btn_end');
	btn_end.each(function(i, btn) {
		btn.addEventListener('tap', function() {
			var _self = this;
			if(_self.picker) {
				_self.picker.show(function (rs) {
					result_end.innerText =  rs.text;
					//result_end.innerText =  rs.text;

					_self.picker.dispose();
					_self.picker = null;
				});
			} else {
				var optionsJson = this.getAttribute('data-options') || '{}';
				var options = JSON.parse(optionsJson);
				var id = this.getAttribute('id');
		
				_self.picker = new $.DtPicker(options);
				_self.picker.show(function(rs) {
		
					result_end.innerText =  rs.text;
				
					_self.picker.dispose();
					_self.picker = null;
				});
			}
			
		}, false);
	});

	var btn_tag_start = $('#btn_tag_start');
	btn_tag_start.each(function(i, btn) {
		btn.addEventListener('tap', function() {
			var _self = this;
			if(_self.picker) {
				_self.picker.show(function (rs) {
					tag_start.innerText =  rs.text;

					_self.picker.dispose();
					_self.picker = null;
				});
			} else {
				var optionsJson = this.getAttribute('data-options') || '{}';
				var options = JSON.parse(optionsJson);
				var id = this.getAttribute('id');
			
				_self.picker = new $.DtPicker(options);
				_self.picker.show(function(rs) {
			
					tag_start.innerText = rs.text;
		
					_self.picker.dispose();
					_self.picker = null;
				});
			}
			
		}, false);
	});

	var btn_tag_end = $('#btn_tag_end');
	btn_tag_end.each(function(i, btn) {
		btn.addEventListener('tap', function() {
			var _self = this;
			if(_self.picker) {
				_self.picker.show(function (rs) {
					tag_end.innerText = rs.text;

					_self.picker.dispose();
					_self.picker = null;
				});
			} else {
				var optionsJson = this.getAttribute('data-options') || '{}';
				var options = JSON.parse(optionsJson);
				var id = this.getAttribute('id');
			
				_self.picker = new $.DtPicker(options);
				_self.picker.show(function(rs) {
		
					tag_end.innerText = rs.text;

				
					_self.picker.dispose();
					_self.picker = null;
				});
			}
			
		}, false);
	});

	
	
})(mui);
	/*控制打卡長度的按鈕*/
	var tag_length_change = document.getElementById("tag_length");
	//监听点击事件
	tag_length_change.addEventListener("change",function () {
		var tag_length = parseInt($('#tag_length').val());
		if(tag_length <= 0) {
			$('.mui-btn-numbox-minus').hide();
		} else {
			$('.mui-btn-numbox-minus').show();
		}
	});

	/*時段選中事件*/
	document.querySelector('.selecte_tag_time').addEventListener('selected',function(e){
			var dis = e.detail.el.getAttribute('value');
			if(dis == 1) {
				$('.time_tag').show();
			} else {
				$('.time_tag').hide();
			}
		});

	/*開始結束選中事件*/
	document.querySelector('.selecte_set_time').addEventListener('selected',function(e){
			var dis = e.detail.el.getAttribute('value');
			if(dis == 1) {
				$('.time_set').show();
			} else {
				$('.time_set').hide();
			}
		});

	function btnSub() {
		var tag_name = $('#tag_name').val();
		var tag_length = parseInt($('#tag_length').val());
		var result_start = $('#result_start').text();
		var result_end = $('#result_end').text();
		var tag_start = $('#tag_start').text();
		var tag_end = $('#tag_end').text();
		console.log(tag_name);
		console.log(tag_length);
		console.log(result_start);
		console.log(result_end);
		console.log(tag_start);
		console.log(tag_end);
		if(!tag_name) {
			mui.alert('打卡名稱不得爲空');
		} else if (tag_length < 0) {
			mui.alert('打卡長度不得爲負數');
		} else {
			/*提交*/
			mui.ajax('/api/index/addaction',{
				data:{
					name: tag_name,
					time_length: tag_length,
					result_start: result_start,
					result_end: result_end,
					start_time: tag_start,
					end_time: tag_end

				},
				dataType:'json',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				//headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if(data.code == '200') {
						mui.alert('添加成功');
						window.location.href = '/index/listlog';
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
		}
		// var btnArray = ['确认', '取消'];
		// mui.confirm('test', 'title', btnArray, function(e) {

		// }); 
	}

	function btnCancel() {
		window.location.href = '/index/listlog';
	}
</script>
@endsection