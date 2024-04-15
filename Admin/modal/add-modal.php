<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-item">Add Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- form -->
            <form action="../data/data-items.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" id="" name="i_id">

                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" id="" name="i_name" class="form-control" placeholder="Name" required>
                    </div>

                    <select class="form-select form-select-sm" aria-label="Small select example" id="" name="i_type" required>
                        <option selected>Choose type</option>
                        <option value="Rooms">Rooms</option>
                        <option value="Cottages">Cottages</option>
                        <option value="Foods">Foods</option>
                    </select>

                    <div class="mb-3 mt-7">
                        <label for="formFile" class="form-label">Upload image</label>
                        <input class="form-control" type="file" id="" accept=".jpg, .jpeg, .png" name="i_img" required>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="" name="i_desc" required></textarea>
                        <label for="description">Description</label>
                    </div>
                    <br>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" id="" name="i_price" class="form-control" placeholder="price" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Quantity</span>
                        <input type="number" id="" name="i_quantity" class="form-control" placeholder="quantity" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
    </div>
</div>