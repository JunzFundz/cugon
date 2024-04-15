<!-- Modal -->
<div class="modal fade" id="decline-request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request cancel?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body2">
                <br>
                
                <input type="text" id="user_id"  name="user_id" value="" hidden/>

                <div style="margin: 30px;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason">
                        <label class="form-check-label">
                            Not Applicable
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason">
                        <label class="form-check-label">
                            Insufficient Information Provided
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason">
                        <label class="form-check-label">
                            Request Does Not Meet Requirements
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason">
                        <label class="form-check-label">
                            Request Already Processed
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason">
                        <label class="form-check-label">
                            Other (Please Specify)
                        </label>
                    </div>
                    <br>
    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-user_id="<?= $rows['user_id']; ?>" data-res_id="<?= $rows['res_id']; ?>" data-item_id="<?= $rows['item_id']; ?>" data-res_num="<?= $rows['res_number']; ?>" data-total_amount="<?= $rows['total']; ?>" class="btn btn-danger decline-btn">Confirm</button>
            </div>
        </div>
    </div>
</div>