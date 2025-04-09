<div class="row">
    <div class="col-md-4">
        <div class="card">
            <h4 class="card-header bg-light">
                <?php echo $mode == 'edit' ? 'Edit Category' : 'Add Category' ?>
            </h4>
            <div class="card-body">
                <form action="<?php echo URL ?>dashboard/category/<?php echo $mode == 'edit' ? 'updateCategory' : 'addCategory' ?>" method="post" class="text-start mb-3 validate_form">
                    <div class="mb-3">
                        <label class="form-label" for="category_name">Category Name</label>
                        <input type="text" id="category_name"
                            value="<?php echo $mode == 'edit' ? $category->category_name : '' ?>"
                            name="category_name" class="form-control required" placeholder="Enter category name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="warehouse_location">Category Description</label>
                        <textarea rows="2"
                            class="form-control"
                            placeholder="Enter Category Description...."
                            name="category_description"><?php echo $mode == 'edit' ? $category->description : '' ?></textarea>
                    </div>
                    <?php if ($mode == 'edit') { ?>
                        <input type="hidden" name="category_id" value="<?php echo $category->id ?>" />
                    <?php } ?>
                    <button class="btn btn-<?php echo $mode == 'edit' ? 'warning' : 'primary' ?> btn-block"
                        type="submit">
                        <?php echo $mode == 'edit' ? 'Edit Category' : 'Add Category' ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header bg-light">
                Categories List
            </h4>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 1;
                            foreach ($categories as $category) { ?>
                                <tr>
                                    <td><?php echo $c; ?></td>
                                    <td><?php echo $category->category_name; ?></td>
                                    <td><?php echo $category->description; ?></td>
                                    <td>
                                        <a href="<?php echo URL ?>dashboard/categories?mode=edit&id=<?php echo $category->id; ?>"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-danger btn-sm ms-2 delete_row"
                                            onclick="deleteRow(this)"
                                            data-message="You want to delete this category?"
                                            data-url="<?php echo URL ?>dashboard/category/delete"
                                            data-id="<?php echo $category->id; ?>" role="button">
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