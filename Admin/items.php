<?php
// session_start();
// include ('../data/data-items.php');
?>
<nav aria-label="breadcrumb" class="breadcrumb--custom--style">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-modal">Add Item</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-type-modal">Add Type</a>
        </li>
    </ol>
</nav>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="disabled-tab-0" data-bs-toggle="tab" href="#disabled-tabpanel-0" role="tab" aria-controls="disabled-tabpanel-0" aria-selected="true">Items</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="disabled-tab-1" data-bs-toggle="tab" href="#disabled-tabpanel-1" role="tab" aria-controls="disabled-tabpanel-1" aria-selected="false">Ratings</a>
    </li>
</ul>
<div class="tab-content pt-5" id="tab-content">
    <div class="tab-pane active" id="disabled-tabpanel-0" role="tabpanel" aria-labelledby="disabled-tab-0">
        <div class="cards" style="height: 90dvh; overflow:scroll;">
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
    </div>

    <div class="tab-pane" id="disabled-tabpanel-1" role="tabpanel" aria-labelledby="disabled-tab-1">
        <?php include('items-rating.php') ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#back-home').on('click', function(event) {
            event.preventDefault();
            $('.main').load('dashboard.php');
        });
    })
</script>