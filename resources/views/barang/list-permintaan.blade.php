@extends('layouts.app')
@section('title','List Permintaan')
@section('content')
<div class="container">
    <div class="row mt-4">
        <h3 class="fw-12">List Permintaan Barang</h3>
        <div class="col-md-12">
            <table class="table-striped table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>User</td>
                        <td>Barang</td>
                        <td>Kuantiti</td>
                        <td>Tanggal Permintaan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permintaans as $permintaan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permintaan->user->name }}</td>
                        <td>{{ $permintaan->barang->name }}</td>
                        <td>{{ $permintaan->kuantiti }}</td>
                        <td>{{ date("d M Y", strtotime($permintaan->tgl_permintaan)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $permintaans->links() }}
        </div>
    </div>
</div>
@endsection
