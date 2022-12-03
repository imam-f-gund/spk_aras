<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>

<!-- Chart library -->
<script src="{{ asset('plugins/chart.min.js') }}"></script>
<!-- Icons library -->
<script src="{{ asset('plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('plugins/fontawesome/js/all.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#dataTable").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            },
            "ordering": false
        });
    });

    $(document).ready(function() {
        $(".dataTablePerhitungan").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            },
            "ordering": true
        });
    });
</script>

@if ($errors->any())
    <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h6>{{ $error }}</h6>
        @endforeach
    </div>
@endif

@if (config('sweetalert.animation.enable'))
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
@endif
<script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<script type="text/javascript">
    var cekError = {{ $errors->any() > 0 ? 'true' : 'false' }};
    var ht = $("#ERROR_COPY").html();
    if (cekError) {
        Swal.fire({
            title: 'Errors',
            icon: 'error',
            html: ht,
            showCloseButton: true,
        });
    }
</script>

<script type="text/javascript">
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: 'Apakah kamu yakin ?',
            text: "Data akan dihapus dari database",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya, Hapus !",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                console.log(form.attr('action'));
                form.submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Dibatalkan !',
                    'Data tidak berhasil terhapus',
                    'error'
                )
            }
        });
    });
</script>

@include('sweetalert::alert')
