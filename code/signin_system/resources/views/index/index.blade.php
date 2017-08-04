<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="{{ asset('mui-master/examples/hello-mui/css/mui.min.css') }}">
		<style type="text/css">
			#list {
				/*避免导航边框和列表背景边框重叠，看起来像两条边框似得；*/
				margin-top: -1px;
			}
			
		
		</style>
    </head>
    <body>
        <header class="mui-bar mui-bar-nav">
			<!-- <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a> -->
			<h1 class="mui-title">考研監督神器</h1>
		</header>
        <div class="mui-content">
        	<div class="mui-card">
	        	<ul class="mui-table-view">
					 <li class="mui-table-view-cell">倒計時<spen style="float: right">000</spen></li>
			         <li class="mui-table-view-cell">Item 2</li>
			         <li class="mui-table-view-cell">Item 3</li>
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
						<p>Posted on January 18, 2016</p>
						<p style="color: #333;"></p>
					</div>
				</div>
				<div class="mui-card-footer">
					<a class="mui-card-link">開始</a>
					<a class="mui-card-link">查看</a>
				</div>
			</div>
        </div>
		<!--  -->

    </body>
    <script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
	<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		var slider = mui("#slider");
		slider.slider({
			interval: 5000
		});
	</script>
    
</html>