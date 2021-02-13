<!-- 
cannotreceivepostdata
Login               passwordnotmatch    usernotexist
Register            autologinfailed     cannotinsertuserdataintodatabase
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
if (isset($_GET['reason'])) {
    switch ($_GET['reason']) {
        case ("autologinfailed"):
            $headline = "Auto Login Failed";
            $body = "Your account has been successfully registered, but some technical issues occur. Please login again manually";
            break;
        case ("cannotinsertuserdataintodatabase"):
            $headline = "Register Account Failed";
            $body = "Your account is not successfully registered due to technical issue.";
            break;
        case ("cannotreceivepostdata"):
            $headline = "Failed to Pass Information";
            $body = "Your registration information cannot pass to backend due to technical issue.";
            break;
        case ("passwordnotmatch"):
            $headline = "Password Not Match";
            $body = "Your login password is not matched with your account. Please try again";
            break;

        case ("failedtopostquestion"):
            $headline = "Failed to Post Question";
            $body = "Your question cannot be posted due to technical issue. Please try again";
            break;
        case ("failedtopostanswer"):
            $headline = "Failed to Post Answer";
            $body = "Your answer cannot be posted due to technical issue. Please try again";
            break;
        case ("cannotcreatevoterecord"):
            $headline = "Failed to Create Vote Record";
            $body = "Your answer cannot be posted due to failure of creating vote record. Please try again ";
            break;

        case ("failedtodeleteanswer"):
            $headline = "Failed to Delete Answer";
            $body = "Your answer cannot be deleted due to technical issue. Please try again ";
            break;
    }
}

?>

<div class="modal fade" id="failedToModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead" id="messageHeadline"><?php echo $headline; ?></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p id="messageBody"><?php echo $body; ?></p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['reason'])) :  ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#failedToModal').modal('show');
})
</script>
<?php endif; ?>