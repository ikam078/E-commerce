@extends('layouts.parent')

@section('title', 'Dashboard')

@section('content')
Hello{{ Auth::user()->name }}
@endsection