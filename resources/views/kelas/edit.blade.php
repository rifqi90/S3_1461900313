@extends('layout')

@section('content')

<form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input required="required" type="text" name="kelas" value="{{ $kelas->kelas }}">
    <button type="submit">Simpan</button>
</form>

@stop