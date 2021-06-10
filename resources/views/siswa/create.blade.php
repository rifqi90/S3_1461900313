@extends('layout')

@section('content')

<form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <input required="required" type="text" name="siswa">
    <button type="submit">Simpan</button>
</form>

@stop
