<!-- Standard modal content -->
<div id="customerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="custModalTitle" id="customerModalLabel">Add Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="customer_form" action="<?= URL ?>dashboard/contact/addContact" method="post" class="text-start mb-2 validate_form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="text" name="first_name" class="form-control required" id="firstname" placeholder="Enter First Name" value="<?= isset($customer) ? $customer->first_name : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" name="last_name" class="form-control required" id="lastname" placeholder="Enter Last Name" value="<?= isset($customer) ? $customer->last_name : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control required" id="email" placeholder="Enter Email" value="<?= isset($customer) ? $customer->email : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" name="phone" class="form-control required phone" id="phone" placeholder="Enter Phone" value="<?= isset($customer) ? $customer->phone : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control required" id="address" placeholder="Enter Address" value="<?= isset($customer) ? $customer->address : '' ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="city" class="form-label">City:</label>
                                <input type="text" name="city" class="form-control required" id="city" placeholder="Enter City" value="<?= isset($customer) ? $customer->city : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="state" class="form-label">State:</label>
                                <input type="text" name="state" class="form-control" id="state" placeholder="Enter State" value="<?= isset($customer) ? $customer->state : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="zip_code" class="form-label">Zip Code:</label>
                                <input type="text" name="zip_code" class="form-control required number" id="zip_code" placeholder="Enter Zip Code" value="<?= isset($customer) ? $customer->zip_code : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="state" class="form-label">Country:</label>
                                <input type="text" name="country" class="form-control" id="country" placeholder="Enter country" value="<?= isset($customer) ? $customer->country : '' ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="customer_id">
                    <button id="add_customer_btn" class="btn btn-<?= $mode == 'edit' ? 'warning' : 'primary' ?> btn-block" type="submit">
                        <?= $mode == 'edit' ? 'Edit Customer' : 'Add Customer' ?>
                    </button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->