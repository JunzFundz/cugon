<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">You</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Accounts</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <form id="change--pass--form" class="" action="../data/user-save-info.php" method="post">
            <input type="text" id="uid" value="<?php echo htmlspecialchars($_SESSION['user_id']) ?>" hidden>
            <div class="row" style="margin-top: 30px; width: 50%">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Old Password</label>
                        <input type="password" class="form-control"  id="old_pass" name="old_pass" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" class="form-control " id="new_pass" name="new_pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Re-type Password</label>
                        <input type="password" class="form-control"  id="re_pass" name="re_pass">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <?php include('accounts.php') ?>
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

    </div>
    <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

    </div>
</div>