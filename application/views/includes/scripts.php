<!-- Vendor js -->
<script src="<?php echo ASSETS ?>js/vendor.min.js"></script>

<!-- App js -->
<script src="<?php echo ASSETS ?>js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.8.4/axios.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?php echo ASSETS ?>vendor/sweetalert2/sweetalert2.min.js"></script>

<script src="<?php echo ASSETS ?>js/functions.js"></script>

<!-- Validation js -->
<script src="<?php echo ASSETS ?>js/validation.js"></script>



<?php if ($this->session->flashdata('message')) { ?>
    <script>
        let icon = "<?php echo $this->session->flashdata('message_type') ?>";
        let message = "<?php echo $this->session->flashdata('message') ?>";
        showAlert(icon, message);
    </script>
<?php } ?>