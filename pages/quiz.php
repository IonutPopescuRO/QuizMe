		<br><br><br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Question <?php print ' ('.$ev['status'].' / '.count($quest).')'; ?>: <?php if($question_info['time']) { ?><span id="countdown" class="pull-right" style="color: red;"></span><?php } ?></h4><hr>
                  <p class="lead">
                    <center><?php print $question_info['question']; ?></center>
                  </p><hr><br><br>
                  <p class="card-description">
				  <form action="app/quiz/" method="post">
                    <?php if($question_info['type']==0) { ?>
						<?php for($i=0;$i<4;$i++) { ?>
						<div class="form-group">
							<div class="row">
								<div class="col-1"></div>
								<div class="col-1">
									<input type="radio" class="form-check-input" name="answer_one_check" value="<?php print $i; ?>" id="radio_check"<?php if($check_answer && $question_info['check'.$i]) print ' checked'; if($check_answer) print ' disabled';?>>
								</div>
								<div class="col-10"><p><?php print $question_info['answer'.$i]; ?></p></div>
							</div><hr>
						</div>
					<?php } } else if($question_info['type']==1) { ?>

						<?php for($i=0;$i<4;$i++) { ?>
						<div class="form-group">
							<div class="row">
								<div class="col-1"></div>
								<div class="col-1">
									<input type="checkbox" class="form-check-input" name="answer_many_check_<?php print $i; ?>">
								</div>
								<div class="col-10"><p><?php print $question_info['answer'.$i]; ?></p></div>
							</div><hr>
						</div>
						<?php } ?>
						<?php } else { ?>
						<div class="form-group">
							<textarea class="form-control" name="free_answer" id="answer_button" rows="2"<?php if($check_answer) print ' disabled'; ?>><?php if($check_answer) print $question_info['answer0']; ?></textarea>
						</div>
						<?php } if(!$check_answer) { ?>
						<button id="answer" class="add_form_field file-upload-browse btn btn-info" type="submit" name="answer">Answer</button>
						<?php } else { ?>
						<a class="add_form_field file-upload-browse btn btn-info" href="app/quiz&next=1">Next question ></a>
						<?php } ?>
					</form>
                  </p>
                </div>
              </div>
            </div>
		</div>