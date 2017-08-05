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
<div class="mui-content-padded">
	<form class="mui-input-group">
		<div class="mui-input-row">
			<label>Input</label>
			<input type="text" placeholder="普通输入框">
		</div>
		<div class="mui-input-row">
			<label>Input</label>
			<input type="text" class="mui-input-clear" placeholder="带清除按钮的输入框" data-input-clear="5"><span class="mui-icon mui-icon-clear mui-hidden"></span>
		</div>

		<div class="mui-input-row mui-plus-visible">
			<label>Input</label>
			<input type="text" class="mui-input-speech mui-input-clear" placeholder="语音输入" data-input-clear="6" data-input-speech="6"><span class="mui-icon mui-icon-clear mui-hidden"></span><span class="mui-icon mui-icon-speech"></span>
		</div>
		<div style="padding: 1% 2%">
			<button id='TagPicker' class="mui-btn mui-btn-block" type='button'>打卡讀物</button>
			<div id='TagResult' class="ui-alert"></div>
		</div>
		<div style="padding: 1% 2%">
			<button id='MoonPicker' class="mui-btn mui-btn-block" type='button'>打卡心情</button>
			<div id='MoonResult' class="ui-alert"></div>
		</div>
		<div class="mui-button-row">
			<button type="button" class="mui-btn mui-btn-primary" onclick="sub();">确认</button>&nbsp;&nbsp;
			<button type="button" class="mui-btn mui-btn-danger" onclick="return false;">取消</button>
		</div>
	</form>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
		<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.min.js') }}"></script>
		<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.js') }}"></script>
		<script src="{{ asset('mui-master/examples/hello-mui/js/mui.poppicker.js') }}"></script>
		<script src="{{ asset('mui-master/examples/hello-mui/js/city.data.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ asset('mui-master/examples/hello-mui/js/city.data-3.js') }}" type="text/javascript" charset="utf-8"></script>
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
					//普通示例
					var TagPicker = new $.PopPicker();
					TagPicker.setData([{
						value: 'ywj',
						text: '董事长 叶文洁'
					}, {
						value: 'aaa',
						text: '总经理 艾AA'
					}, {
						value: 'lj',
						text: '罗辑'
					}, {
						value: 'ymt',
						text: '云天明'
					}, {
						value: 'shq',
						text: '史强'
					}, {
						value: 'zhbh',
						text: '章北海'
					}, {
						value: 'zhy',
						text: '庄颜'
					}, {
						value: 'gyf',
						text: '关一帆'
					}, {
						value: 'zhz',
						text: '智子'
					}, {
						value: 'gezh', 
						text: '歌者'
					}]);
					var TagPickerButton = doc.getElementById('TagPicker');
					var TagResult = doc.getElementById('TagResult');
					TagPickerButton.addEventListener('tap', function(event) {
						TagPicker.show(function(items) {
							console.log(items[0].value);
							TagResult.innerText = items[0].text;//JSON.stringify(items[0].text);
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
					//-----------------------------------------
					var MoonPicker = new $.PopPicker();
					MoonPicker.setData([{
						value: 'ywj',
						text: '董事长 叶文洁'
					}, {
						value: 'aaa',
						text: '总经理 艾AA'
					}, {
						value: 'lj',
						text: '罗辑'
					}, {
						value: 'ymt',
						text: '云天明'
					}, {
						value: 'shq',
						text: '史强'
					}, {
						value: 'zhbh',
						text: '章北海'
					}, {
						value: 'zhy',
						text: '庄颜'
					}, {
						value: 'gyf',
						text: '关一帆'
					}, {
						value: 'zhz',
						text: '智子'
					}, {
						value: 'gezh', 
						text: '歌者'
					}]);
					var MoonPickerButton = doc.getElementById('MoonPicker');
					var MoonResult = doc.getElementById('MoonResult');
					MoonPickerButton.addEventListener('tap', function(event) {
						MoonPicker.show(function(items) {
							console.log(items[0].value);
							MoonResult.innerText = items[0].text;//JSON.stringify(items[0].text);
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
					
				});
			})(mui, document);

			function sub() {
				var MoonResult = $('#MoonResult').text();
				var TagResult = doc.getElementById('TagResult');
				alert(MoonResult);

			}
		</script>
@endsection