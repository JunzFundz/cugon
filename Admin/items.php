<?php
session_start();
include '../data/data-items.php';
?>
<nav aria-label="breadcrumb" class="breadcrumb--custom--style">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" id="back-home">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-modal">Add</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Data</a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">Action</a>
                </li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
    </ol>
</nav>

<div class="cards" style="height: 90dvh; overflow:scroll">
    <?php foreach ($items as $rows) : ?>

        <div class="card" style="width: 18rem; display: inline-block; margin:10px;">
            <div class="card-items">
                <img src="Items/<?php echo $rows['i_img'] ?>" class="card-img-top" alt="green iguana" style="object-fit: contain; aspect-ratio: 3/2;" />
                <div class="card-body">
                    <h4><?php echo $rows['i_name'] ?></h4>
                    <h4 style="font-size: 14px; color:red ">₱<?php echo $rows['i_price'] ?></h4>
                    <p class="" style="height: 10vh; font-size:10px; overflow:scroll">
                        <?php echo $rows['i_desc'] ?>
                    </p>
                    <div>
                        <button class="btn btn-primary editItem" type="button" id="editItem" data-item_id="<?php echo $rows['i_id'] ?>">Update</button>
                        
                        <button class="btn btn-link" style="color: red;" type="button" onclick="deleteItem('<?php echo $rows['i_id']; ?>')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    $(document).ready(function(){
        $('#back-home').on('click', function(event) {
            event.preventDefault();
            $('.main').load('dashboard.php');
        });
    })
</script>