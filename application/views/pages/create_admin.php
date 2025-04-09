<div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
    <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                <h4 class="fw-semibold mb-2">Install <?= APP_NAME ?></h4>
                <hr>
                <form action="<?php echo URL ?>installSoftware" method="post" class="text-start mb-3 validate_form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="full_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" class="form-control required" placeholder="Enter your Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control required" placeholder="Enter your Username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control required" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control required phone" placeholder="Enter your Phone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control required" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" data-match="password" name="confirm_password" class="form-control required match" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Install <?= APP_NAME; ?></button>
                    </div>
                </form>
                <p class="mt-auto mb-0">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © <?= APP_NAME ?> <?= APP_VERSION ?> - By
                    <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">
                        Softring Solutions
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>