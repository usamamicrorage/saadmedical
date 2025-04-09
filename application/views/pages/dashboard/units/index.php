<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h5 class="card-header bg-light">
                <?= $mode == 'edit' ? 'Edit Unit' : 'Add New Unit' ?>
            </h5>
            <div class="card-body">
                <form action="<?= URL ?>dashboard/unit/<?= $mode == 'edit' ? 'updateUnit' : 'addUnit' ?>" method="post" class="text-start mb-3 validate_form">
                    <div class="mb-3">
                        <label class="form-label" for="unit_name">Unit Name</label>
                        <input type="text" id="unit_name" name="unit_name" value="<?= $mode == 'edit' ? $unit->unit_name : '' ?>" class="form-control required" placeholder="Enter unit name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Category</label>
                        <select id="category" name="category" class="form-select required">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category->id; ?>" <?= $mode == 'edit' && $unit->category_id == $category->id ? 'selected' : '' ?>>
                                    <?= $category->category_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input" id="is_base" value="1" name="is_base" <?= empty($units) || ($mode == 'edit' && $unit->is_base == 1) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="is_base">Is Base Unit?</label>
                        </div>
                    </div>
                    <div id="master_div" class="mb-3" style="display: <?= empty($units) || ($mode == 'edit' && $unit->is_base == 1) ? 'none' : 'block' ?>;">
                        <label class="form-label" for="master_unit">Select Unit <small class="text-danger">(Select 1 level Top Unit)</small></label>
                        <select id="master_unit" class="form-select" name="master_unit">
                            <option value="">Select Unit</option>
                            <?php foreach ($units as $unito) { ?>
                                <option value="<?= $unito->id; ?>" <?= $mode == 'edit' && $unit->qty_unit == $unito->id ? 'selected' : '' ?>>
                                    <?= $unito->unit_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="qty_per_unit">Quantity Per Unit</label>
                        <input type="text" id="qty_per_unit" name="qty_per_unit" value="<?= $mode == 'edit' ? $unit->qty_per_unit : '' ?>" class="form-control required number" placeholder="Enter quantity per unit">
                    </div>
                    <?php if ($mode == 'edit') { ?>
                        <input type="hidden" name="unit_id" value="<?php echo $unit->id; ?>">
                    <?php } ?>
                    <button class="btn btn-<?= $mode == 'edit' ? 'warning' : 'primary' ?> btn-block" type="submit">
                        <?= $mode == 'edit' ? 'Edit Unit' : 'Add Unit' ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <h5 class="card-header bg-light">Units</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="warehouses_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Category</th>
                                <th>Qty Per Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($units as $unit) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $unit->unit_name; ?></td>
                                    <td><?= $unit->category_name; ?></td>
                                    <td><?= $unit->qty_per_unit . ' ' . $unit->measure_unit; ?></td>
                                    <td>
                                        <a href="<?= URL ?>dashboard/units?mode=edit&id=<?= $unit->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-danger btn-sm ms-2 delete_row" onclick="deleteRow(this)" data-message="You want to delete this Unit?" data-url="<?= URL ?>dashboard/unit/delete" data-id="<?= $unit->id; ?>">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>