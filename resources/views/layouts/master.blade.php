<!DOCTYPE html>
<html>
<head>
	<meta HTTP-EQUIV="Pragma" CONTENT="no-cache"><!--  -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" href="http://localhost:8079/notiser/public/src/css/main.css">
	<script src="https://use.fontawesome.com/c2c8233ffa.js"></script>
	

	
	<title>@yield('title')</title>
	<style>@yield('styles')</style>
	
</head>

<body>
	<header>@include('includes.header')</header>
	<div class="main">@yield('content')</div>
</body>
</html>