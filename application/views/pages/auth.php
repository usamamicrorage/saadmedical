<div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
    <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                <h4 class="fw-semibold mb-2">Login your account</h4>
                <hr>
                <form action="<?php echo URL ?>loginUser" method="post" class="text-start mb-3 validate_form">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control required" placeholder="Enter your username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control required" placeholder="Enter your password">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="to_url" value="<?php echo $to ?>">
                        <button class="btn btn-primary" type="submit">Login</button>
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