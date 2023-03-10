<?= $this->extend('template/main.php') ?>

<!-- Section Title -->
<?= $this->section('title') ?>
Abude - Data Barang
<?= $this->endSection() ?>

<!-- Section CSS -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/DataTables-1.13.1/css/dataTables.bootstrap5.min.css" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/DataTables-1.13.1/css/jquery.dataTables.min.css">
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
                                        <!-- Modal -->
                                    <div class="modal fade" id="modalTambah">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Barang</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal">
                                                    </button>
                                                </div>
                                    <form action="javascript:void(0)" name="form_tambah" id="form_tambah" method="post">
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
                                    </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Kembali</button>
                                                    <button type="button" id="submit-btn" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <!-- row -->
                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">List Barang 
                                <button data-bs-toggle="modal" data-bs-target="#modalTambah" type="button" class="btn btn-rounded btn-outline-primary"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                                    </span>Tambah barang</button>
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
                                                <th>Aksi</th>
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
<script src="<?= base_url() ?>/vendor/global/global.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="<?= base_url() ?>/assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>/assets/js/deznav-init.js"></script>
<script src="<?= base_url() ?>/assets/js/demo.js"></script>
<script src="<?= base_url() ?>/assets/js/styleSwitcher.js"></script>
<script>
    if ($("#form_tambah").length > 0) {
            $("#form_tambah").validate({
                rules: {
                    nama_barang: {
                        required: true
                    },
                    harga_barang: {
                        required: true
                    },
                    satuan: {
                        required: true
                    },
                },
                messages: {
                    nama_barang: {
                        required: "barang tidak boleh kosong",
                    },
                    harga_barang: {
                        required: "harga tidak boleh kosong",
                    },
                    satuan: {
                        required: "satuan tidak boler kosong",
                    },
                },
                submitHandler: function(form) {
                    $('.response-message').removeClass('d-none');
                    $('#submit-btn').html('Sending..');
                    $.ajax({
                        url: "<?php echo base_url('ajax-store') ?>",
                        type: "POST",
                        data: $('#form_tambah').serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#submit-btn').html('Submit');
                            $('.response-message').html(response?.message);
                            response?.status === 'success' && $('.response-message').addClass('text-success') || $('.response-message').addClass('text-danger');
                            $('.response-message').show();
                            $('.response-message').removeClass('d-none');

                            document.getElementById("form_tambah").reset();
                            setTimeout(function() {
                                $('.response-message').hide();
                            }, 5000);
                        }
                    });
                }
            })
        }
</script>
</script>


<?= $this->endSection() ?>