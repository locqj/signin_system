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
<div class="mui-card">
	<div class="mui-card-header mui-card-media" >
		<img src="{{ $user->head_img }}"/>
		<div class="mui-media-body">
			{{ $user->nickname }}<span id="hello_time"></span>
		</div>
		<!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
		<h2>小M</h2>
		<p>发表于 2016-06-30 15:30</p>-->
	</div>
	<ul class="mui-table-view matters">
		 <li class="mui-table-view-cell clone_block"><span></span><span style="float: right">test</span></li>
	</ul>
<div id="slider" class="mui-slider" >

	<div class="mui-slider-group mui-slider-loop">
		<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
		<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}">
			</a>
		</div>
		<!-- 第一张 -->
		<div class="mui-slider-item">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/shuijiao.jpg') }}">
			</a>
		</div>
		<!-- 第二张 -->
		<div class="mui-slider-item">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/muwu.jpg') }}">
			</a>
		</div>
		<!-- 第三张 -->
		<div class="mui-slider-item">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/cbd.jpg') }}">
			</a>
		</div>
		<!-- 第四张 -->
		<div class="mui-slider-item">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}">
			</a>
		</div>
		<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
		<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="#">
				<img src="{{ asset('mui-master/examples/hello-mui/images/shuijiao.jpg') }}">
			</a>
		</div>
	</div>
	<div class="mui-slider-indicator">
		<div class="mui-indicator mui-active"></div>
		<div class="mui-indicator"></div>
		<div class="mui-indicator"></div>
		<div class="mui-indicator"></div>
	</div>
</div>
	<div class="mui-card-content">
		<div class="mui-card-content-inner">
			<p><!-- Posted on January 18, 2016 --></p>
			<p style="color: #333;"></p>
		</div>
	</div>
	<div class="mui-card-footer">
		<a class="mui-card-link a-start" href="#bottomPopover">开始</a>
		<a class="mui-card-link a-log" href="{{ url('index/listlog') }}">查看</a>
		<a class="mui-card-link a-add" href="{{ url('index/addaction') }}">添加</a>
	</div>
</div>
<ul class="mui-table-view mui-grid-view mui-grid-9">
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-home"></span>
            <div class="mui-media-body">Home</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-email"><span class="mui-badge">5</span></span>
            <div class="mui-media-body">Email</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-chatbubble"></span>
            <div class="mui-media-body">Chat</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-location"></span>
            <div class="mui-media-body">location</div></a></li>
</ul>
<div id="bottomPopover" class="mui-popover mui-popover-bottom">
	<div class="mui-popover-arrow"></div>
	<div class="mui-scroll-wrapper div-start">
		<div class="mui-scroll">
			<ul class="mui-table-view ul-start ">
				<li class="mui-table-view-cell li-start-label">当前时段可打卡項目</a>
				</li>
				<li class="mui-table-view-cell clone_block-start"><span></span><a href=""></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

<script type="text/javascript" charset="utf-8">
mui('.mui-scroll-wrapper').scroll(); //滑塊滑動
	var slider = mui("#slider");
	slider.slider({
		interval: 5000
	});
</script>
<script type="text/javascript">
	$.get('/api/index/getmatter', function(data) {
		if(data.code == 200) {
			var clone_block = $('.clone_block');
			$.each(data.data, function(key, val) {
				console.log(val.name);
				var clo = clone_block.clone(true);
                $(clo).removeClass('clone_block');
                $(clo).children('span').eq(0).text(val.name);
                var msg = '还有'+val.daymatter+'天';
                $(clo).children('span').eq(1).text(msg);
                $(clo).show();
                $('.matters').append(clo);
			})
		}
	});



	$('.a-start').click(function() {
		$.get('/api/index/startlist', function(data) {
			if (data.code == 200) {
				if (data.data.length == 0) {
					mui.toast('请新添加打卡项目');
				} else {
					var clone_block_start = $('.clone_block-start');
					$.each(data.data, function(key, val) {
						var clo = clone_block_start.clone(true);
						$(clo).removeClass('clone_block-start');
						var href_link = 'index/actions/'+val.code;
						$(clo).children('a').attr('href', href_link);
						$(clo).children('span').text(val.name);
						$(clo).show();
						$('.ul-start').append(clo);
					});
				}
			}
		});
	});

</script>
<script type="text/javascript">
	now = new Date();
	hour = now.getHours();
	console.log(hour);
	if (hour >= 6 && hour < 8) {
		$('#hello_time').text(", 早上好");
	} else if (hour >= 8 && hour < 11) {
		$('#hello_time').text(", 上午好");
	} else if (hour >= 11 && hour < 13) {
		$('#hello_time').text(", 中午好");
	} else if (hour >= 13 && hour < 18) {
		$('#hello_time').text(", 下午好");
	} else {
		$('#hello_time').text(", 晚上好");
	}
</script>
@endsection

