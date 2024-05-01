<!-- Modal -->
<div class="modal fade" id="decline-request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Request cancel?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body2">
                
                <input type="text" id="user_id"  name="" value="" hidden/>
                <input type="text" id="res_id"  name="" value="" hidden/>
                <input type="text" id="res_num"  name="" value="" hidden/>

                <div style="margin: 20px;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason1" value="Not Applicable">
                        <label class="form-check-label">
                            Not Applicable
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason2" value="Insufficient Information Provided">
                        <label class="form-check-label">
                            Insufficient Information Provided
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason3" value="Request Does Not Meet Requirements">
                        <label class="form-check-label">
                            Request Does Not Meet Requirements
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason4" value="Request Already Processed">
                        <label class="form-check-label">
                            Request Already Processed
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="reason5" value="Other (Please Specify)">
                        <label class="form-check-label">
                            Other (Please Specify)
                        </label>
                    </div>
                    <br>
    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-danger decline-btn">Confirm</button>
            </div>
        </div>
    </div>
</div>