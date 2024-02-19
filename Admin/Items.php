<?php
session_start();
include '../data/data-items.php';
?>

<style>
    .container-new {
        grid-template-columns: repeat(7, 1fr);
        display: grid;
    }

    .top-nav {
        grid-column: 1/8;
        height: 100px;
        align-items: center;
        display: inline-block;
    }

    .right {
        height: 75vh;
        margin-top: 10px;
        grid-column: 1/8;
        overflow: scroll;
    }

    .new-block>div {
        box-shadow: 10px 13px 33px -1px rgba(194, 194, 194, 1);
        margin: 10px;
        display: inline-block;
    }

    .image-prod {
        object-fit: contain;
        aspect-ratio: 3/2;
        width: 200%;
    }

    .new-height {
        margin-left: 30px;
        margin-top: 30px;
    }
    .btn-custom{
        margin-top: 40px;
    }
    .search-bar{
        height: 30px;
    }
</style>

<!-- Modal Edit Items -->
<div class="modal fade edit-modal" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tae</h1>
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

                    <select class="form-select form-select-sm" aria-label="Small select example" id="type" name="i_type">
                        <option selected>Choose type</option>
                        <option value="Rooms">Rooms</option>
                        <option value="Cottages">Cottages</option>
                        <option value="Foods">Foods</option>
                    </select>

                    <div class="mb-3 mt-7">
                        <label for="formFile" class="form-label">Upload image</label>
                        <input class="form-control" type="file" id="i_img" accept=".jpg, .jpeg, .png" name="i_img">

                        <input class="form-control" type="hidden" id="old_img" accept=".jpg, .jpeg, .png" name="old_img">
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


<div class="container-new">

    <div class="top-nav">
        <button type="button" class="btn-custom btn btn-primary btn-sm">Add Item</button>
    </div>

    <div class="right">

        <?php foreach ($result as $rows) : ?>

            <div class="card" style="width: 18rem; display: inline-block;">
                <input type="hidden" class="item_id" value="<?php echo $rows['i_id'] ?>">
                <img src="Items/<?php echo $rows['i_img'] ?>" class="card-img-top" alt="..." style="object-fit: contain; aspect-ratio: 3/2;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['i_name'] ?></h5>
                    <p class="card-text"><?php echo $rows['i_desc'] ?></p>
                    <p class="card-text">₱ <?php echo number_format($rows['i_price']) ?></p>
                    <a href="#" class="btn btn-primary editItem">Edit Item</a>
                    <a href="#" class="btn btn-danger" onclick="deleteItem('<?php echo $rows['i_id']; ?>')">Delete</a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<script src="../src/sweetalert.min.js"></script>
<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?> -->

<script>
    // swal({
    //     title: "<?php echo $_SESSION['status']; ?>",
    //     icon: "<?php echo $_SESSION['status_code']; ?>",
    //     button: "Ok!",
    // });
</script>
<!-- <?php
            unset($_SESSION['status']);
        }
        ?> -->