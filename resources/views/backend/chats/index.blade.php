@extends('layouts.app')

@section('content')
<chat v-bind:user="{{ $user }}" v-bind:partner="{{ $partner }}" v-bind:messages="{{ $messages ?? [] }}"></chat>
@endsection