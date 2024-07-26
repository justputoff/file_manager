@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Dashboard -> Selamat datang {{ Auth::user()->name }}</h5>
    </div>
</div>
<!-- / Content -->
@endsection
