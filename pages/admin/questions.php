<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Questions</h4>
				<?php if($info==1) print '<div class="alert alert-success alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
											  The question has been added.
											</div>'; 
				?>
				<p>
					<a class="btn btn-primary" data-toggle="collapse" href="#questions" role="button" aria-expanded="false" aria-controls="questions">
						Add questions<i class="mdi mdi-plus"></i>
					</a>
				</p>
				<div class="collapse" id="questions">
					<div class="card card-body">


						<input type="file" class="dropify" id="files" data-allowed-file-extensions="csv" />

  <table id="contents" style="width:100%; height:400px;" border>
  </table>
  
							<hr>
						<form action="" method="post">
							<div class="form-group"><br>
								<div class="questions_container">
									<div>
										<div class="form-group">
											<label for="months">Question</label>
											<textarea class="form-control" name="question" rows="4" required></textarea>
										</div>
										<div class="form-group">
											<label for="months">Category</label>
											<select class="form-control" name="category">
												<?php foreach($categories as $category) print '<option value="'.$category['id'].'">'.$category['name'].'</option>'; ?>
											</select>
										</div>
										
										<div class="form-group">
											<a class="btn btn-primary" role="button" data-toggle="collapse" href="#time" aria-expanded="false" aria-controls="time">
												Answer question time
											</a>
											<div class="collapse" id="time">
												<div class="form-group"><br>
													<div class="row">
														<div class="col-lg-3">
															<label for="reason">Minutes</label>
															<input class="form-control" type="number" value="0" id="time_minutes" name="time_minutes" min="0" required>
														</div>
														<div class="col-lg-3">
															<label for="hours">Seconds</label>
															<input class="form-control" type="number" value="0" id="time_seconds" name="time_seconds" min="0" required>
														</div>
													</div>
												</div>
											</div>
										</div>
					
										<div class="form-group">
											<label for="months">Answer type</label>
											<select class="form-control" name="answer_type" onchange="answerType(this);">
												<option value="0">One answer</option>
												<option value="1" selected>Many answers</option>
												<option value="2">Free text answer</option>
											</select>
										</div>
										
										<div class="form-group" id="many_answer">
											<label for="months">Answer</label>
											<?php for($i=0;$i<4;$i++) { ?>
											<div class="form-group">
												<div class="row">
													<div class="col-1"></div>
													<div class="col-1">
														<input type="checkbox" class="form-check-input" name="answer_many_check_<?php print $i; ?>">
													</div>
													<div class="col-10"><input class="form-control" type="text" name="answer_many_<?php print $i; ?>"></div>
												</div>
											</div>
											<?php } ?>
										</div>
										
										<div class="form-group" id="one_answer" style="display: none;">
											<label for="months">Answer</label>
											<?php for($i=0;$i<4;$i++) { ?>
											<div class="form-group">
												<div class="row">
													<div class="col-1"></div>
													<div class="col-1">
														<input type="radio" class="form-check-input" name="answer_one_check" value="<?php print $i; ?>" id="radio_check">
													</div>
													<div class="col-10"><input class="form-control" type="text" name="answer_one_<?php print $i; ?>"></div>
												</div>
											</div>
											<?php } ?>
										</div>
										<div class="form-group" id="free_answer" style="display: none;">
											<label for="months">Answer</label>
											<textarea class="form-control" name="free_answer" rows="2"></textarea>
										</div>
										
										<div class="form-group">
											<label for="months">Difficulty level</label>
											<select class="form-control" name="difficulty">
												<option value="1">Easy</option>
												<option value="2" selected>Normal</option>
												<option value="3">Hard</option>
											</select>
										</div>
									</div>
								</div>
								<button class="add_form_field file-upload-browse btn btn-info" type="submit">Add question</button>
							</div>
						</form>

					</div>

					</div>
				</div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Sales
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-medium">
                                    1
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td class="text-danger"> 53.64%
                                    <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-medium">
                                    2
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td class="text-success"> 24.56%
                                    <i class="mdi mdi-arrow-up"></i>
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-medium">
                                    3
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td class="text-danger"> 28.76%
                                    <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-medium">
                                    4
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td class="text-danger"> 53.45%
                                    <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-medium">
                                    5
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td class="text-success"> 18.32%
                                    <i class="mdi mdi-arrow-up"></i>
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-medium">
                                    6
                                </td>
                                <td>
                                    Henry Tom
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 150.00
                                </td>
                                <td class="text-danger"> 24.67%
                                    <i class="mdi mdi-arrow-down"></i>
                                </td>
                                <td>
                                    June 16, 2015
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
