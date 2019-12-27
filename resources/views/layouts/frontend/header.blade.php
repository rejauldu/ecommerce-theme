<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--base url for Script files -->
	<meta name="base-url" content="{{ url('/') }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/gif" sizes="16x16">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- All packages style -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<!-- Animation on Scroll -->
	<link rel="stylesheet" href="{{ asset('css/aos.css') }}">
	<!-- Style for this theme -->
	<link href="{{ asset('css/theme.css') }}" rel="stylesheet">
	@yield('style')
</head>
<body>
	<div id="app"><!-- #app for vuejs -->
		<div class="container-fluid">