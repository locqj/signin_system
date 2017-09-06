@extends('index.layouts.nav')

@section('body')
<link rel="stylesheet" href="{{ asset('weui-master/style/weui.css') }}"/>
<link rel="stylesheet" href="{{ asset('weui-master/style/weui2.css') }}"/>
<link rel="stylesheet" href="{{ asset('weui-master/style/weui3.css') }}"/>
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
<style type="text/css">
	.mui-preview-image.mui-fullscreen {
		position: fixed;
		z-index: 20;
		background-color: #000;
	}
	.mui-preview-header,
	.mui-preview-footer {
		position: absolute;
		width: 100%;
		left: 0;
		z-index: 10;
	}
	.mui-preview-header {
		height: 44px;
		top: 0;
	}
	.mui-preview-footer {
		height: 50px;
		bottom: 0px;
	}
	.mui-preview-header .mui-preview-indicator {
		display: block;
		line-height: 25px;
		color: #fff;
		text-align: center;
		margin: 15px auto 4;
		width: 70px;
		background-color: rgba(0, 0, 0, 0.4);
		border-radius: 12px;
		font-size: 16px;
	}
	.mui-preview-image {
		display: none;
		-webkit-animation-duration: 0.5s;
		animation-duration: 0.5s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}
	.mui-preview-image.mui-preview-in {
		-webkit-animation-name: fadeIn;
		animation-name: fadeIn;
	}
	.mui-preview-image.mui-preview-out {
		background: none;
		-webkit-animation-name: fadeOut;
		animation-name: fadeOut;
	}
	.mui-preview-image.mui-preview-out .mui-preview-header,
	.mui-preview-image.mui-preview-out .mui-preview-footer {
		display: none;
	}
	.mui-zoom-scroller {
		position: absolute;
		display: -webkit-box;
		display: -webkit-flex;
		display: flex;
		-webkit-box-align: center;
		-webkit-align-items: center;
		align-items: center;
		-webkit-box-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		left: 0;
		right: 0;
		bottom: 0;
		top: 0;
		width: 100%;
		height: 100%;
		margin: 0;
		-webkit-backface-visibility: hidden;
	}
	.mui-zoom {
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	.mui-slider .mui-slider-group .mui-slider-item img {
		width: auto;
		height: auto;
		max-width: 100%;
		max-height: 100%;
	}
	.mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
		width: 100%;
	}
	.mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
		display: inline-table;
	}
	.mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
		display: table-cell;
		vertical-align: middle;
	}
	.mui-preview-loading {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		display: none;
	}
	.mui-preview-loading.mui-active {
		display: block;
	}
	.mui-preview-loading .mui-spinner-white {
		position: absolute;
		top: 50%;
		left: 50%;
		margin-left: -25px;
		margin-top: -25px;
		height: 50px;
		width: 50px;
	}
	.mui-preview-image img.mui-transitioning {
		-webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
		transition: transform 0.5s ease, opacity 0.5s ease;
	}
	@-webkit-keyframes fadeIn {
		0% {
			opacity: 0;
		}
		100% {
			opacity: 1;
		}
	}
	@keyframes fadeIn {
		0% {
			opacity: 0;
		}
		100% {
			opacity: 1;
		}
	}
	@-webkit-keyframes fadeOut {
		0% {
			opacity: 1;
		}
		100% {
			opacity: 0;
		}
	}
	@keyframes fadeOut {
		0% {
			opacity: 1;
		}
		100% {
			opacity: 0;
		}
	}
	p img {
		max-width: 100%;
		height: auto;
	}
</style>
<div class="mui-card">
<div class="title">轮播图管理</div>
<form  action="/index/upload" method="post" enctype="multipart/form-data"  onsubmit="return submitUp();" >
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
		    <div class="weui_uploader">
		        <div class="weui_uploader_hd weui_cell">
		            <div class="weui_cell_bd weui_cell_primary">上传图片</div>
		            <div class="weui_cell_ft"></div>
		        </div>
		        <div class="weui_uploader_bd">
		            <ul class="weui_uploader_files" id='img1'>
		            </ul>
		            <div class="weui_uploader_input_wrp">
		                <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" id="i1" name="source" onchange="previewImage(this)"/>
		                <input  type="hidden"  id="i4"/>
		            </div>
		        </div>
		    </div>
		    <div class="weui_cell_bd weui_cell_primary">选择图片位置</div>
		    <button id='showUserPicker' class="mui-btn mui-btn-block" type='button'>图片类型</button>
		    	<!-- 是否规定类型 -->
		    	<input type="hidden" id="dist_type" value="0">
				<div id='userResult' class="ui-alert image-type"></div>
		</div>
    </div>
    	<button type="submit" class="mui-btn mui-btn-primary mui-btn-block">确认提交</button>
</form>
</div>
<div class="mui-card">	
<div class="title">首页轮播图</div>
	<ul class="mui-table-view mui-grid-view">
		@foreach($index as $list)
        <li class="mui-table-view-cell mui-media mui-col-xs-6">
            <a href="#">
	            <div class="mui-slider-right mui-disabled">
					<a class="mui-btn mui-btn-red btn-del" value="{{ $list->id }}">删除</a>
				</div>
	            <img class="mui-media-object" src="/storage/{{ $list->img_url }}" data-preview-src="" data-preview-group="1">
	            <div class="mui-media-body mui-slider-handle"></div>
            </a>
        </li>
        @endforeach
    </ul>    
</div>

<div class="mui-card">	
<div class="title">活动页轮播图</div>
	<ul class="mui-table-view mui-grid-view">
		@foreach($action as $list)
        <li class="mui-table-view-cell mui-media mui-col-xs-6">
            <a href="#">
	            <div class="mui-slider-right mui-disabled">
					<a class="mui-btn mui-btn-red btn-del" value="{{ $list->id }}">删除</a>
				</div>
	            <img class="mui-media-object" src="/storage/{{ $list->img_url }}" data-preview-src="" data-preview-group="1">
	            <div class="mui-media-body mui-slider-handle"></div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.picker.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.zoom.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.previewimage.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.poppicker.js') }}"></script>
<script src="{{ asset('weui-master/zepto.min.js') }}"></script>
<script src="{{ asset('weui-master/lrz.min.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>
<script>

mui.previewImage();

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
	var userPicker = new $.PopPicker();
	userPicker.setData([{
		value: '1',
		text: '首页轮播'
	}, {
		value: '2',
		text: '活动页轮播'
	}]);
	var showUserPickerButton = doc.getElementById('showUserPicker');
	var userResult = doc.getElementById('userResult');
	var dist_type = doc.getElementById('dist_type');
	showUserPickerButton.addEventListener('tap', function(event) {
		userPicker.show(function(items) {
			userResult.innerHTML = "<input type='hidden' name='status_log' value="+items[0]['value']+">你的选择为： "+items[0]['text'];//JSON.stringify(items[0]);
			//返回 false 可以阻止选择框的关闭
			//return false;
			dist_type.value = 1;
		});
	}, false);
	//-----------------------------------------

	
});
})(mui, document);
</script>
<script type="text/javascript">
function previewImage(file) {
    var MAXWIDTH = 100;
    var MAXHEIGHT = 200;
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function (evt) {         
            $('#img1').html('<li class="weui_uploader_file" style="background-image:url('+evt.target.result+')"></li>');
            
        };
        reader.readAsDataURL(file.files[0]);//
        console.log(file.files[0]);
    }
}

function submitUp() {
	var index_count = '{{ $count['index'] }}';
	var action_count = '{{ $count['action'] }}';
	if ($('#dist_type').val() == 0) {
		mui.alert('请选择图片位置');
		return false;
	} else if (index_count >= 4 || action_count >= 4) {
		mui.alert('所选类型轮播图已有4张，请删除多余的图片！');
		return false;
	}
}
</script>
<script type="text/javascript">
	$('.btn-del').click(function() {
		var id = $(this).attr('value');
		var tag = $(this).parent().parent();
		$.get('/api/index/delimg?id='+id, function(data) {
			if(data.code == 204) {
				tag.hide();
				mui.toast('删除成功');
			}
		});
	});
</script>
@endsection