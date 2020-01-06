@extends('layouts.app')

@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<chat v-bind:user="{{ $user }}" v-bind:partner="{{ $partner }}" v-bind:messages="{{ $messages ?? [] }}"></chat>
	</div>
</div>
@endsection