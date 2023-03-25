<?= $this->extend('template/main.php') ?>

<!-- Section Title -->
<?= $this->section('title') ?>
Abude - Data User
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
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active"><a href="#">List User</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-12">
            <div id="alert-berhasil-tambah" class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Sukses!</strong> Menambah User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-berhasil-hapus" class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Sukses!</strong> Menghapus User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-berhasil-edit" class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Sukses!</strong> Mengubah User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-gagal-tambah" class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> Gagal menambah User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-gagal-hapus" class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> Gagal menghapus User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div id="alert-gagal-edit" class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> Gagal mengedit User.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">List User
                            <button data-bs-toggle="modal" data-bs-target="#modalTambah" type="button" class="btn btn-primary">Tambah Data <span class="btn-icon-end"><i class="fa fa-plus"></i></span>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambah">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form id="form-tambah" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_perusahaan" value="<?= session('id_perusahaan') ?>">
                                                <input type="hidden" name="id_cabang" value="<?= session('id_cabang') ?>">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="text" id="password" name="password" class="form-control" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="role" class="form-label">Role</label>
                                                        <select id="role" name="role" class="form-control default-select form-control-lg" tabindex="-98">
                                                            <option value="SuperAdmin">SuperAdmin</option>
                                                            <option value="Owner">Owner</option>
                                                            <option value="Admin Cabang">Admin Cabang</option>
                                                        </select>
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

                            <!-- Modal -->
                            <div class="modal fade" id="modalEdit">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form id="form-edit" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_user" id="id_user_edit">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="username_edit" class="form-label">Username</label>
                                                        <input type="text" id="username_edit" name="username" class="form-control" placeholder="Username" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="password_edit" class="form-label">Password</label>
                                                        <input type="text" id="password_edit" name="password" class="form-control" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="role_edit" class="form-label">Role</label>
                                                        <select id="role_edit" name="role" class="form-control default-select form-control-lg" tabindex="-98">
                                                            <option value="SuperAdmin">SuperAdmin</option>
                                                            <option value="Owner">Owner</option>
                                                            <option value="Admin Cabang">Admin Cabang</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                                                <button type="button" onclick="updateData()" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table_user" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Dimuat</th>
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
<script src="<?= base_url() ?>assets/vendor/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/DataTables-1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#alert-berhasil-tambah').hide();
        $('#alert-berhasil-hapus').hide();
        $('#alert-berhasil-edit').hide();
        $('#alert-gagal-tambah').hide();
        $('#alert-gagal-hapus').hide();
        $('#alert-gagal-edit').hide();
    });

    var table = $('#table_user').DataTable({
        ajax: {
            url: '<?= base_url() ?>API/User',
            dataSrc: '',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + '<?= session('token') ?>');
            }
        },
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        type: "GET",
        columns: [{
                data: 'username'
            },
            {
                data: 'password'
            },
            {
                data: 'role'
            },
            {
                data: 'created_at'
            },
            {
                data: 'id_user',
                render: function(data, type, row) {

                    return '<div class="d-flex">					<button type="button" onclick="editData(' + data + ')" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></button>		<button type="button" onclick="hapusData(' + data + ')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button> </div>'
                }
            },
        ],
    })

    function convertFormToJSON(form) {
        return $(form).serializeArray().reduce(function(json, {
            name,
            value
        }) {
            json[name] = value;
            return json;
        }, {})
    }

    function getData(id) {

    }

    function tambahData() {
        var data_post = convertFormToJSON($('#form-tambah'))
        console.log(data_post)
        console.log(JSON.stringify(data_post));
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>API/User",
            data: JSON.stringify(data_post),
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + '<?= session('token') ?>');
            },
        }).done(function(response) {
            $('#modalTambah').modal('toggle');
            if (response.status) {
                    $('#alert-berhasil-tambah').show();
                } else {
                    $('#alert-gagal-tambah').show();
                }
            table.ajax.reload();
        })
    }

    function hapusData(id) {
        if (confirm("Yakin untuk menghapus data?") == true) {
            $.ajax({
                url: "<?= base_url(); ?>API/User/" + id,
                method: "DELETE",
                contentType: "application/json",
                beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + '<?= session('token') ?>');
            }
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
        else {
            return false;
        }
    }

    function editData(id) {
        $('#modalEdit').modal('toggle');
        $.ajax({
                method: "GET",
                url: "<?= base_url(); ?>API/User/" + id,
                dataType: "json",
                beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + '<?= session('token') ?>');
            }
            })
            .done(function(response) {
                $('#id_user_edit').val(response[0].id_user)
                $('#username_edit').val(response[0].username)
                $('#password_edit').val(response[0].password)
                $('#role_edit').val(response[0].role)
            });
    }

    function updateData() {
        var data_post = convertFormToJSON($('#form-edit'))
        $.ajax({
                method: "PUT",
                url: "<?= base_url(); ?>/API/User/" + data_post['id_user'],
                contentType: "application/json",
                data: data_post,
                dataType: "json",
                beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + '<?= session('token') ?>');
            }
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