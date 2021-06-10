@extends('layout')

@section('content')

<form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input required="required" type="text" name="siswa" value="{{ $siswa->siswa }}">
    <button type="submit">Simpan</button>
</form>

@stop