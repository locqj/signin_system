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
		<div class="mui-button-row">
			<button type="button" class="mui-btn mui-btn-primary" onclick="return false;">确认</button>&nbsp;&nbsp;
			<button type="button" class="mui-btn mui-btn-danger" onclick="return false;">取消</button>
		</div>
	</form>
</div>
@endsection