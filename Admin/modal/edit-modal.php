<div class="modal fade edit-modal" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- form -->
            <form action="../data/data-items.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" id="item_id" name="i_id">

                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" id="name" name="i_name" class="form-control" placeholder="Name">
                    </div>

                    <select class="form-select form-select-sm i_type2" aria-label="Small select example" id="i_type" name="i_type" required>
                        <option selected>Choose type</option>
                    </select>

                    <div class="mb-3 mt-7">
                        <label for="formFile" class="form-label">Upload image</label>
                        <input class="form-control" type="file" id="i_img" accept=".jpg, .jpeg, .png" name="i_img">

                        <input class="form-control" type="text" id="old_img" accept=".jpg, .jpeg, .png" name="old_img">
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="description" name="i_desc"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <br>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" id="price" name="i_price" class="form-control" placeholder="price">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Quantity</span>
                        <input type="number" id="quantity" name="i_quantity" class="form-control" placeholder="quantity">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#edit-modal').on('show.bs.modal', function(event) {
            var modal = $(this);

            $.ajax({
                url: '../data/admin-fetch-type.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var options = '';
                        $.each(response.types, function(index, value) {
                            options += '<option value="' + value.type + '">' + value.type + '</option>';
                        });
                        $('.i_type2').html('<option selected>Choose type</option>' + options);
                    } else {
                        alert('Error fetching data');
                    }
                },
                error: function() {
                    alert('Error fetching data');
                }
            });
        });
    });
</script>