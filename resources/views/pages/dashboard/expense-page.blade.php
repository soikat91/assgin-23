@extends('layouts.sidenav-layout')

@section('content')

@include('components.Expense.expense-list')
@include('components.Expense.expense-delete')
@include('components.Expense.expense-create')
@include('components.Expense.expense-update')

@endsection