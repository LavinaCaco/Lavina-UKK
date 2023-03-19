<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Setup</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/LM.png')?>">

</head>

<body class="bg-gradient-white">

    <div class="container col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class=""></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Setup Admin!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('C_lavinaAuth/setup') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap">
                                    <?= form_error('nama_petugas', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="telp" name="telp" placeholder="telp">
                                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat Password">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>

                                <button href="<?= base_url('C_lavinaAuth') ?>" type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('C_lavinaAuth') ?>">Already have an account? Login!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=<?= base_url('assets/vendor/jquery/jquery.min.js') ?>></script>
    <script src=<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>></script>

    <!-- Core plugin JavaScript-->
    <script src=<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>></script>

    <!-- Custom scripts for all pages-->
    <script src=<?= base_url('assets/js/sb-admin-2.min.js') ?>></script>

</body>

</html>