@extends('layout')

@section('content')

<form action="{{ route('guru.store') }}" method="POST">
    @csrf
    <input required="required" type="text" name="guru">
    <button type="submit">Simpan</button>
</form>

@stop
