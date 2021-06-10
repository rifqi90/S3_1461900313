@extends('layout')

@section('content')

<form action="{{ route('guru.update', $guru->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input required="required" type="text" name="guru" value="{{ $guru->guru }}">
    <button type="submit">Simpan</button>
</form>

@stop