<?php
session_start();
include '../data/data-items.php';
?>

<!-- bootsrap -->
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

<!-- datatables -->
<link rel="stylesheet" href="../node_modules/datatables/media/css/jquery.dataTables.css">
<link rel="stylesheet" href="../node_modules/datatables/media/css/jquery.dataTables.min.css">

<!-- Custom style -->
<link rel="stylesheet" href="../src/Adminhome.css">


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

<!-- Modal add Items -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-item">Add Item</h1>
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
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
    </div>
</div>

<div class="admin-container">

    <div class="nav">
        <nav>
            <ul>
                <li id="logo-admin">Cugon bamboo resort</li>
                <li><a href="../database/Logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="left-panel">
        <?php include('left-panel.php') ?>
    </div>

    <div class="right-panel" style="overflow:scroll; height: 80vh;">

        <?php foreach ($result as $rows) : ?>
            <div class="card" style="width: 18rem; display: inline-block; margin:10px;">
                <input type="hidden" class="item_id" value="<?php echo $rows['i_id'] ?>">
                <img src="Items/<?php echo $rows['i_img'] ?>" class="card-img-top" alt="..." style="object-fit: contain; aspect-ratio: 3/2;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['i_name'] ?></h5>
                    <p class="card-text">₱ <?php echo number_format($rows['i_price']) ?></p>
                    <p class="card-text">x<?php echo number_format($rows['i_quantity']) ?></p>
                    <a href="#" class="btn btn-primary editItem">Edit Item</a>
                    <a href="#" class="btn btn-danger" onclick="deleteItem('<?php echo $rows['i_id']; ?>')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<!-- bootstrap -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Datatables -->
<script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>

<!-- admin js -->
<script src="../assets/admin.js"></script>