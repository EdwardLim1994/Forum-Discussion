<div class="modal fade" id="editAnswerModal" tabindex="-1" role="dialog" aria-labelledby="editAnswerModal"
    aria-hidden="true">
    <form action="./includes/functions/answer/edit.php" method="POST">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Answer</h4>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="editAnswerContent">Content</label>
                        <textarea id="editAnswerContent" name="editAnswerContent" class="rounded-lg form-control"
                            rows="5" required></textarea>
                    </div>
                </div>
                <input type="text" class="d-none" id="editAnswerID" name="editAnswerID">
                <div class="modal-footer d-flex justify-content-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="editAnswerSubmit" class="btn btn-info text-white">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>