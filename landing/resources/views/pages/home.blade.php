@extends('layouts.master')

@php
    $pageTitle = "Home";
@endphp

@section('title', $pageTitle)

@section('content')
    <h1>{{ $pageTitle }}</h1>
@endsection


