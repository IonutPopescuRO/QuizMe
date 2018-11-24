<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Questions</h4>
				<p>
					<a class="btn btn-primary" data-toggle="collapse" href="#questions" role="button" aria-expanded="false" aria-controls="questions">
						Add questions<i class="mdi mdi-plus"></i>
					</a>
				</p>
				<div class="collapse" id="questions">
					<div class="card card-body">


						<input type="file" class="dropify" id="files" data-allowed-file-extensions="csv" />

							<div class="form-group"></br>
								<div class="questions_container">
									<div class="form-group">
										<label for="months">Question</label>
										<textarea class="form-control" name="questions[]" rows="4" required></textarea>
									</div>
									<div class="form-group">
										<label for="months">Answer type</label>
										<select class="form-control" name="answer_type[]" onchange="answerType(this);">
											<option value="1" selected>One answer</option>
											<option value="2">Many answers</option>
											<option value="3">Free text answer</option>
										</select>
									</div>
									
									<div id="test" style="display: none;">salut</div>
									
									<div class="form-group">
										<label for="months">Difficulty level</label>
										<select class="form-control" name="question_type[]">
											<option value="1">Easy</option>
											<option value="2" selected>Normal</option>
											<option value="3">Hard</option>
										</select>
									</div>
								</div>
								<button class="add_form_field file-upload-browse btn btn-info pull-right" type="button">+</button>
							</div>


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
</div>