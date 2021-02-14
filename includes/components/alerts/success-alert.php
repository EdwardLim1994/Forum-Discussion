<?php

    //To set success alert message headline and body
    //If there is get request with success parameter
    if (isset($_GET['success'])) {
        switch ($_GET['success']) {

            //If it is "Success to Post Question"
            case ("successtopostquestion"):
                $headline = "Success to Post Question";
                $body = "Your question has been successfully posted";
                break;

            //If it is "Success to Delete Question"
            case ("successtodeletequestion"):
                $headline = "Success to Delete Question";
                $body = "Your question has been successfully deleted";
                break;

            //If it is "Success to Edit Question"
            case ("successtoeditquestion"):
                $headline = "Success to Edit Question";
                $body = "Your question has been successfully edited";
                break;

            //If it is "Success to Post Answer"
            case ("successtopostanswer"):
                $headline = "Success to Post Answer";
                $body = "Your answer has been successfully posted";
                break;

            //If it is "Success to Delete Answer"
            case ("successtodeleteanswer"):
                $headline = "Success to Delete Answer";
                $body = "Your answer has been successfully deleted";
                break;

            //If it is "Success to Edit Question"
            case ("successtoeditanswer"):
                $headline = "Success to Edit Answer";
                $body = "Your answer has been successfully edited";
                break;

        }
    }
?>

<div class="modal fade" id="successToModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead"><?= $headline ?></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p><?= $body ?></p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>

<!-- Render this javascript ONLY IF there is get request with success parameter -->
<?php if (isset($_GET['success'])) :  ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#successToModal').modal('show');
    })
    </script>
<?php endif; ?>