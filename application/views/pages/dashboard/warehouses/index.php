<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h4 class="card-header bg-light">
                <?php echo $mode == 'edit' ? 'Edit Warehouse' : 'Add Warehouse' ?>
            </h4>
            <div class="card-body">
                <form action="<?php echo URL ?>dashboard/warehouse/<?php echo $mode == 'edit' ? 'updateWarehouse' : 'addWarehouse' ?>" method="post" class="text-start mb-3 validate_form">
                    <div class="mb-3">
                        <label class="form-label" for="warehouse_name">Warehouse Name</label>
                        <input type="text" id="warehouse_name"
                            value="<?php echo $mode == 'edit' ? $warehouse->name : '' ?>"
                            name="warehouse_name" class="form-control required" placeholder="Enter warehouse name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="warehouse_location">Warehouse Location</label>
                        <input type="text" id="warehouse_location"
                            value="<?php echo $mode == 'edit' ? $warehouse->location : '' ?>"
                            name=" warehouse_location" class="form-control required" placeholder="Enter warehouse location">
                    </div>
                    <?php if ($mode == 'edit') { ?>
                        <input type="hidden" name="warehouse_id" value="<?php echo $warehouse->id ?>" />
                    <?php } ?>
                    <button class="btn btn-<?php echo $mode == 'edit' ? 'warning' : 'primary' ?> btn-block"
                        type="submit">
                        <?php echo $mode == 'edit' ? 'Edit Warehouse' : 'Add Warehouse' ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header bg-light">
                Warehouse List
            </h4>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="warehouses_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Warehouse Name</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 1;
                            foreach ($warehouses as $warehouse) { ?>
                                <tr>
                                    <td><?php echo $c; ?></td>
                                    <td><?php echo $warehouse->name; ?></td>
                                    <td><?php echo $warehouse->location; ?></td>
                                    <td>
                                        <a href="<?php echo URL ?>dashboard/warehouses?mode=edit&id=<?php echo $warehouse->id; ?>"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-danger btn-sm ms-2 delete_row"
                                            onclick="deleteRow(this)"
                                            data-message="You want to delete this warehouse?"
                                            data-url="<?php echo URL ?>dashboard/warehouse/delete"
                                            data-id="<?php echo $warehouse->id; ?>" role="button">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php $c++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>