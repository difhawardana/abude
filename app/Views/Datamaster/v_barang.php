<?= $this->extend('template/main.php') ?>

<!-- Section Title -->
<?= $this->section('title') ?>
Abude - Data Barang
<?= $this->endSection() ?>

<!-- Section CSS -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/datatables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/DataTables-1.13.1/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>
<!-- Section Content -->
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <?= \Config\Services::validation()->listErrors(); ?>
        <!-- Add Project -->
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Selamat datang Kembali!</h4>
                    <span>Mohon isikan dengan hati-hati</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">List Barang</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div id="alert-sukses" class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Sukses!</strong> Menambah barang.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-gagal" class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> Gagal menambah data.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">List Barang
                            <button data-bs-toggle="modal" data-bs-target="#modalTambah" type="button" class="btn btn-primary">Tambah Data <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambah">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form id="form-tambah" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama barang" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="harga_barang" class="form-label">Harga Barang (Rupiah)</label>
                                                        <input type="text" id="harga_barang" name="harga_barang" class="form-control" placeholder="Harga barang" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="satuan" class="form-label">Satuan</label>
                                                        <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                                                <button type="button" onclick="tambahData()" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table_barang" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama barang</th>
                                        <th>Harga Barang</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>

<!-- Section Javascript -->
<?= $this->section('script') ?>
<script data-cfasync="false" src="<?= base_url() ?>/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url() ?>vendor/global/global.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/deznav-init.js"></script>
<script src="<?= base_url() ?>assets/js/demo.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/DataTables-1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#alert-sukses').hide();
        $('#alert-gagal').hide();

        $('#table_barang').DataTable({
            ajax: {
                url: '<?= base_url() ?>API/Barang',
                dataSrc: ''
            },
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: "GET",
            columns: [{
                    data: 'id_barang'
                },
                {
                    data: 'nama_barang'
                },
                {
                    data: 'harga_barang'
                },
                {
                    data: 'satuan'
                },
            ],
        })
    });

    function tambahData() {
        var data_post = $('#form-tambah').serialize();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>API/Barang",
            data: data_post,
            dataType: "json"
        }).done(function(response) {
            $('#modalTambah').modal('toggle');
            if (response.status) {
                $('#alert-sukses').show();
            } else {
                $('#alert-gagal').show();
            }
            table.ajax.reload();
        })
    }

    function hapusData() {
        $.ajax({
                method: "DELETE",
                url: "<?= base_url(); ?>API/Barang",
                data: {
                    id: id
                },
                dataType: "json"
            })
            .done(function(response) {
                if (response.status) {
                    $('#alert-berhasil-hapus').show();
                } else {
                    $('#alert-gagal-hapus').show();
                }
                table.ajax.reload();
            });
    }

    function editData(id) {
        $('#modalEdit').modal('toggle');
        $.ajax({
                method: "POST",
                url: "<?= base_url('Pengaturan/getPaket'); ?>",
                data: {
                    id: id
                },
                dataType: "json"
            })
            .done(function(response) {
                $('#id_paket_edit').val(response.id_paket)
                $('#nama_paket_edit').val(response.nama_paket)
                $('#harga_per_kg_edit').val(response.harga_per_kg)
                $('#modalEdit').modal('toggle');
            });
    }

    function simpanData() {
        var data_post = $('#form-edit').serialize();
        $.ajax({
                method: "POST",
                url: "<?= base_url('Pengaturan/editPaket'); ?>",
                data: data_post,
                dataType: "json"
            })
            .done(function(response) {
                $('#modalEdit').modal('toggle');
                if (response.status) {
                    $('#alert-berhasil-edit').show();
                } else {
                    $('#alert-gagal-edit').show();
                }
                table.ajax.reload();
            });
    }
</script>


<?= $this->endSection() ?>