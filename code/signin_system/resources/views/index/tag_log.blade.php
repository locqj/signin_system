@extends('index.layouts.nav')
<!--App自定义的css-->
		<link rel="stylesheet" href="{{ asset('mui-master/examples/hello-mui/css/mui.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('mui-master/examples/hello-mui/css/app.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('mui-master/examples/hello-mui/css/mui.picker.css') }}" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="{{ asset('mui-master/examples/hello-mui/css/mui.poppicker.css') }}" rel="stylesheet" />
		
		<style>
			.mui-btn {
				font-size: 16px;
				padding: 8px;
				margin: 3px;
			}
			h5.mui-content-padded {
				margin-left: 3px;
				margin-top: 20px !important;
			}
			h5.mui-content-padded:first-child {
				margin-top: 12px !important;
			}
			.ui-alert {
				text-align: center;
				padding: 20px 10px;
				font-size: 16px;
			}
		</style>
@section('body')
<div class="mui-card">
	<h5  style="padding: 1% 2%">打卡記錄</h5>
	<div class="mui-card-content-inner">
		<div style="padding: 1% 2%">
			<button id='TagPicker' class="mui-btn mui-btn-block mui-btn-outlined" type='button'>讀物</button>
			<div id='TagResult' class="ui-alert"></div>
			<span id='TagValue' style="display: none;"></span>
		</div>
		<div style="padding: 1% 2%">
			<button id='MoonPicker' class="mui-btn mui-btn-block mui-btn-outlined" type='button'>心情</button>
			<div id='MoonResult' class="ui-alert"></div>
			<span id='MoonValue' style="display: none;"></span>
		</div>
		<div class="mui-button-row">
			<button type="button" class="mui-btn mui-btn-primary sub_btn">确认</button>
		</div>
	</div>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.poppicker.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/city.data.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/city.data-3.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

<script>
	(function($, doc) {
		$.init();
		$.ready(function() {
			/**
			 * 获取对象属性的值
			 * 主要用于过滤三级联动中，可能出现的最低级的数据不存在的情况，实际开发中需要注意这一点；
			 * @param {Object} obj 对象
			 * @param {String} param 属性名
			 */
			var _getParam = function(obj, param) {
				return obj[param] || '';
			};
			mui.ajax('/api/index/listtag',{
				dataType:'json',//服务器返回json格式数据
				type:'GET',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if (data.code) {
						var TagPicker = new $.PopPicker();
						TagPicker.setData(data.data);
						var TagPickerButton = doc.getElementById('TagPicker');
						var TagResult = doc.getElementById('TagResult');
						var TagValue = doc.getElementById('TagValue');
						TagPickerButton.addEventListener('tap', function(event) {
							TagPicker.show(function(items) {
								
								TagResult.innerText = items[0].text;
								TagValue.innerText = items[0].value;
							});
						}, false);
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
			
			//-----------------------------------------
			mui.ajax('/api/index/listmoon',{
				dataType:'json',//服务器返回json格式数据
				type:'GET',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if (data.code == 200) {
						var MoonPicker = new $.PopPicker();
						MoonPicker.setData(data.data);
						var MoonPickerButton = doc.getElementById('MoonPicker');
						var MoonResult = doc.getElementById('MoonResult');
						var MoonValue = doc.getElementById('MoonValue');
						MoonPickerButton.addEventListener('tap', function(event) {
							MoonPicker.show(function(items) {
								MoonValue.innerText = items[0].value;
								MoonResult.innerText = items[0].text;//JSON.stringify(items[0].text);
								//返回 false 可以阻止选择框的关闭
								//return false;
							});
						}, false);
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
			
		});
	})(mui, document);
</script>
<script>
	$('.sub_btn').click(function() {
		var moon_code = $('#MoonValue').text();
		var tag_code = $('#TagValue').text();
		var action_code = '{{ $code }}';
		if (!tag_code) {
			mui.toast('請選擇讀物');
		} else if (!moon_code) {
			mui.toast('請選擇心情');
		} else {
			mui.ajax('/api/index/addtaglog',{
				data:{
					moon_code: moon_code,
					action_code: action_code,
					tag_code:tag_code
				},
				dataType:'json',//服务器返回json格式数据
				type:'post',//HTTP请求类型
				timeout:10000,//超时时间设置为10秒；
				headers:{'Content-Type':'application/json'},	              
				success:function(data){
					if (data.code == 201) {
						mui.toast('打卡成功');
						window.location.href = '/index';
					}
				},
				error:function(xhr,type,errorThrown){
					//异常处理；
					console.log(type);
				}
			});
		}
	});
</script>
@endsection