<!-- Modal -->
<div class="modal fade" id="decline-request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason" checked>
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
                <button type="button" data-user_id="<?php echo $rows['user_id']; ?>" class="btn btn-danger decline-btn">Confirm</button>
            </div>
        </div>
    </div>
</div>