<html>
	<head>
		<title>@yield('page','DBF')</title>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		@yield('head')
	</head>
	<header>
		<nav id="dbf-menu" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		    <div class="container-fluid">
		        <div class="navbar-header" id="navbar-header"><a class="navbar-brand" href="#">Developer&#x27;s Best Friend</a>
		            <button type="button" class="navbar-toggle" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		            </button>
		        </div>
		        <div class="collapse navbar-collapse">
		            <ul class="nav navbar-nav navbar-left">
		                <!-- <li><a href="/">Home</a>
		                </li> -->
		                <li><a href="/lorem">Lorem</a>
		                </li>
		                <li><a href="/user">User Generator</a>
		                </li>
		            </ul>
		        </div>
		    </div>
		</nav>
	</header>

	<body>
		@yield('content')
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

	@yield('body')
</html>