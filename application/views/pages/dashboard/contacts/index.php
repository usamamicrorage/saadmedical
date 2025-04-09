<div class="row d-flex justify-content-end">
    <div class="col-md-4 mb-2">
        <button onclick="addCustomer(this)" data-submit="<?php echo URL ?>dashboard/contact/addContact" id="add_customer" class="btn btn-primary float-end">Add New Contact</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header bg-light">
                Customers
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="warehouses_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $c = 1;
                            foreach ($contacts as $contcat) { ?>
                                <tr>
                                    <td><?php echo $c++; ?></td>
                                    <td><?php echo $contcat->first_name . ' ' . $contcat->last_name; ?></td>
                                    <td><?php echo $contcat->phone; ?></td>
                                    <td><?php echo $contcat->email; ?></td>
                                    <td><?php echo $contcat->address . ' ' . $contcat->city . ' ' . $contcat->state . ' ' . $contcat->country . ', ' . $contcat->zip_code; ?></td>
                                    <td><?php echo $contcat->loyalty_points; ?></td>
                                    <td>
                                        <button onclick="fetchContact(this)"
                                            data-url="<?php echo URL ?>dashboard/contact/fetchContact/<?php echo $contcat->id; ?>"
                                            data-submit="<?php echo URL ?>dashboard/contact/updateContact"
                                            class="btn btn-sm btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm ms-2 delete_row"
                                            onclick="deleteRow(this)"
                                            data-message="You want to delete this customer?"
                                            data-url="<?php echo URL ?>dashboard/contact/delete"
                                            data-id="<?php echo $contcat->id; ?>" role="button">
                                            <i class="ti ti-trash"></i>
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