@extends('layouts.template')
@section('title', 'Listes des employés')
@section('content')
    {{ dd($employees) }}
@endsection