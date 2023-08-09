@extends('layouts.sidenav-layout')

@section('content')
@include('components.Income.income-list')
@include('components.Income.income-delete')
@include('components.Income.income-create')
@include('components.Income.income-update')

@endsection