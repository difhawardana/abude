<?php
$validation = \Config\Services::validation();
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <title>Abude - Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon.png">
	<link href="<?= base_url() ?>/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3 mr-3">
										<img src="<?= base_url() ?>/assets/images/abude_logo.png" alt="">
									</div>
                                    <h4 class="text-center mb-4">Silahkan Melakukan Login</h4>

                                    <form id="form-tambah" class="form-valide" method="POST" action="<?= base_url('Auth/loginUser') ?>">
                                    <input type="hidden" name="isWeb" value="true">
                                    <div class="form-group">
                                            <label for="username" class="mb-1"><strong>Username</strong>
                                            <span class="text-danger">*</span></label>
                                            <input value="<?= old('username') ?>" type="text" class="form-control" name="username" tabindex="1"
                                                placeholder="username">
                                            <div class="invalid-feedback" style="display: block">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="mb-1"><strong>Password</strong>
                                            <span class="text-danger">*</span></label>
                                            <input value="<?= old('password') ?>" id="password" type="password" class="form-control" name="password" tabindex="2"
                                            placeholder="password">
                                            <div class="invalid-feedback" style="display: block">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button onclick="login()" type="button" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                        <?php if (session()->getFlashData('error')) : ?>
                                                <?= session()->getFlashData('error') ?>
                                            <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <!-- <script src="<?= base_url() ?>/vendor/jquery-validation/jquery.validate.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/vendor/global/global.min.js"></script>
	<script src="<?= base_url() ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/deznav-init.js"></script>
    <script src="<?= base_url() ?>/assets/js/demo.js"></script>

    <script>
        function login() {
        var data_post = convertFormToJSON($('#form-tambah'))
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>API/Login",
            data: data_post,
            dataType: "json"
        }).done(function(response) {
            if (response.status) {
                $('#alert-sukses').show(
                    
                );
            } else {
                $('#alert-gagal').show();
            }
            table.ajax.reload();
        })
    }
    </script>
</body>
</html>