@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>Dashboard Admin</h1>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <p>Halo, {{ Auth::user()->name }}! Anda login sebagai <b>{{ Auth::user()->role }}</b>.</p>
        </div>
    </div>
</section>
@endsection
