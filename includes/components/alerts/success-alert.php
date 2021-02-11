<!--
Post Question
Edit Question
Delete Question
Post Answer
Edit Answer
Delete Answer 
-->

<?php
$headline = "";
$body = "";

if (isset($_GET['success'])) {
    switch ($_GET['success']) {

        case ("successtopostquestion"):
            $headline = "Success to Post Question";
            $body = "Your question has been successfully posted";
            break;
    }
}
?>

<div class="modal fade" id="successToModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead"><?php echo $headline; ?></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p><?php echo $body; ?></p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['success'])) :  ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#successToModal').modal('show');
})
</script>
<?php endif; ?>