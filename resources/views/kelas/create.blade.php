@extends('layout')

@section('content')

<form action="{{ route('kelas.store') }}" method="POST">
    @csrf
    <input required="required" type="text" name="kelas">
    <button type="submit">Simpan</button>
</form>

@stop
