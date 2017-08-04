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
				<div class="mui-card-header mui-card-media" style="height:40vw;background-image:url({{ asset('mui-master/examples/hello-mui/images/cbd.jpg') }})"></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<p>Posted on January 18, 2016</p>
						<p style="color: #333;"></p>
					</div>
				</div>
				<div class="mui-card-footer">
                <button type="button" class="mui-btn mui-btn-royal mui-btn-outlined ">
					開始
				</button>
					<a class="mui-card-link">開始</a>
					<a class="mui-card-link">查看</a>
				</div>
			</div>
        </div>
        
    </body>
    <script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
	<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
   
    
</html>