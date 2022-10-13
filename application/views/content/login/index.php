<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kopi Toratima</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.jpg" type="image/png">

    <!-- CDN Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CDN SwetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-4 d-none d-lg-block">
                <div id="auth-right" style="background: #6c757d;">

                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div id="auth-left" style="padding: 5rem 1rem;">
                    <div style="text-align: center;">
                        <img src="<?= base_url(); ?>/assets/images/logo/favicon.jpg" alt="Logo" width="30%">
                        <h4 class="auth-title text-secondary" style="align-items: center;">Login</h4>
                    </div>
                    <form role="form" action="<?= base_url('login/prosses'); ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">Log in</button>
                        <a href="<?= base_url('') ?>" class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">Halaman Utama</a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div id="auth-right" style="background: #6c757d;">

                </div>
            </div>
        </div>

    </div>


</body>

<script>
    <?php
    if (isset($this->session->swetalert)) {
    ?>
        Swal.fire(<?= $this->session->swetalert ?>);
    <?php
    }
    ?>
</script>

</html>