<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel 9 | @yield('title')</title>
	<!--CSS Only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
	 	<div class="container-fluid">
	    	<a class="navbar-brand" href="#">Laravel 9</a>
	    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	    	</button>

	    	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	      		<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-fill">
	        		<li class="nav-item">
	          			<a class="nav-link active" href="/">Home</a>
	        		</li>

	        		<li class="nav-item">
	          			<a class="nav-link active" href="/students">Students</a>
	        		</li>

	        		<li class="nav-item">
	          			<a class="nav-link active" href="/class">Class</a>
	        		</li>
					<li class="nav-item">
	          			<a class="nav-link active" href="/extracurricular">Extracurricular</a>
	        		</li>
					<li class="nav-item">
	          			<a class="nav-link active" href="/teacher">Teacher</a>
	        		</li>
	      		</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="/logout">Logout</a>
				  	</li>
				</ul>

	    	</div>
	  	</div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<!--Javascript-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>