@extends('layouts.app')
@section('title','Tambah Permintaan Barang')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="formPermintaan">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nik">Nik Peminta</label>
                            <select name="nik" id="nik" class="form-control nikPerminta" style="width: 320px">
                                <option value="null">-- Pilih NIK --</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nik }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="departemen">Departemen</label>
                            <input type="text" name="departemen" id="departemen" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="tanggal">Tanggal Permintaan</label>
                            <input type="date" name="tanggal" id="tanggalPermintaan" class="form-control">
                        </div>
                    </div>
                </div>
                <h6 class="ml-2 font-weight-bold">Daftar Barang</h6>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barang</th>
                                    <th>Lokasi</th>
                                    <th>Stok</th>
                                    <th>Kuantiti</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>*</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                        <div class="mr-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-success" id="btnTambah">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-secondary btnProses">Proses</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
$("#nik").select2({
themes: "bootstrap",
});
$("#nik").on("change", function () {
$.post(
"{{ url('/api/getDataNik') }}",
{ id: $(this).val() },
function (response) {
$("#nama").val(response.name);
$("#departemen").val(response.departemen);
}
);
});

$("#btnTambah").click(function () {
$.get("{{ url('/api/getBarangs') }}", function (response) {
var barang = "";
for (var i = 0; i < response.length; i++) { barang +='<option value="' + response[i].id + '">' + response[i].name
    + "</option>" ; } var last_index=$(".dataBarang:last").attr("data-index"); var next_index=last_index===undefined ? 1
    : Number(last_index) + 1; $( "tbody" ).append(`<tr class="dataBarang" data-index="${next_index}">
    <td>${next_index++}</td>
    <td>
        <select name="barang[]" id="id_barang_${next_index}" class="form-control getBarangById"
            data-index="${next_index}">
            <option value="null">-- Pilih Barang --</option>
            ${barang}
        </select>
    </td>
    <td id="id_lokasi_${next_index}"></td>
    <td id="id_stok_${next_index}"></td>
    <td>
        <input type="number" name="kuantiti[]" id="id_kuantiti_${next_index}" class="form-control" value="1">
    </td>
    <td id="id_satuan_${next_index}"></td>
    <td>
        <input type="text" name="keterangan[]" id="id_keterangan_${next_index}" class="form-control">
    </td>
    <td id="id_status_${next_index}"></td>
    <td><a href="javascript:;" onclick="$(this).parent().parent().remove()">X</a></td>
    </tr>`);
    });
    });

    $(document).on("change", ".getBarangById", function () {
    var index = $(this).attr("data-index");
    $.post(
    "{{ url('/api/getBarangById') }}",
    { id: $(this).val() },
    function (response) {
    if (response.stok == 0) {
    $(".btnProses").hide();
    $("#id_lokasi_" + index).text(response.lokasi);
    $("#id_stok_" + index).text(response.stok);
    $("#id_satuan_" + index).text(response.satuan);
    $("#id_status_" + index).text(
    response.stok === 0 ? "Tidak Terpenuhi" : "Terpenuhi"
    );
    } else {
    $(".btnProses").show();
    $("#id_lokasi_" + index).text(response.lokasi);
    $("#id_stok_" + index).text(response.stok);
    $("#id_satuan_" + index).text(response.satuan);
    $("#id_status_" + index).text(
    response.stok >= 1 ? "Terpenuhi" : "Tidak Terpenuhi"
    );
    }
    }
    );
    });

    $("#formPermintaan").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
    url: "{{ url('/api/permintaan') }}",
    type: "POST",
    data: $(this).serialize(),
    success: function (data) {
    alert("Berhasil Menambahkan Data");
    location.reload();
    },
    error: function () {
    alert("Error Gagal Menambahkan Data");
    },
    });
    });
    });

</script>
@endsection
