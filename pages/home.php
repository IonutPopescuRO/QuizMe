<?php 
	if($current_event!=-1) {
?>
<div class="row purchace-popup">
	<div class="col-12">
		<span class="d-flex alifn-items-center">
			<p>You did not finish your quiz. You will not be able to participate in another until you finish it.</p>
			<a href="app/quiz" class="btn ml-auto purchase-button">Finish it</a>
		</span>
	</div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quizzes you attended</h4>
				
				<?php if(count($my_events)) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Quiz
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Rank
                                </th>
                                <th>
                                    Completed
                                </th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach($my_events as $key => $event) { ?>
                            <tr>
                                <td class="font-weight-medium">
                                    <?php print ($key+1); ?>
                                </td>
                                <td>
                                    <?php print $events->getEventRow($event['id'], 'name'); ?>
                                </td>
                                <td>
								<?php
									$questions = explode(",", $event['questions']);
									$p = intval($event['status']*100/count($questions));
								?>
                                    <div class="progress">
                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: <?php print $p; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    #<?php print $events->getUserRank($event['id']); ?>
                                </td>
                                <td>
                                    <?php print $event['completed']; ?>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
				<?php } else print '<hr><p>Nothing found.</p>'; ?>
            </div>
        </div>
    </div>
</div>