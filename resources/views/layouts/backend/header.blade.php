<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--base url for Script files -->
	<meta name="base-url" content="{{ url('/') }}">
	<title>@yield('title')</title>
	<link rel="icon" href="{{ asset('/assets/favicon.ico') }}" type="image/gif" sizes="16x16">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- All packages style -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<!-- Box style -->
	<link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('/css/theme.css') }}">
	@yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div id="app" class="wrapper"><!-- #app for vuejs -->