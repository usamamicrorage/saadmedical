<div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-18 text-uppercase fw-bold mb-0"><?php echo $title; ?></h4>
    </div>

    <div class="text-end">

        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="<?php echo URL ?>dashboard">
                    <i class="ti ti-home"></i>
                </a>
            </li>
            <?php foreach ($segments as $segment) {
            ?>
                <li class="breadcrumb-item active"><?php echo ucfirst($segment); ?></li>
            <?php

            } ?>
        </ol>
    </div>
</div>