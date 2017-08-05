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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">考研監督神器</h1>
		</header>
		<div class="mui-content">
			@yield('body')
		</div>
    </body>
    <script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
	<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
	
    
</html>