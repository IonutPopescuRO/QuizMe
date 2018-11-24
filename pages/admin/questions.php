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
				

				<div class="jumbotron jumbotron-fluid" style="padding: 1rem 2rem;">
					<form action="" method="POST">
						<div class="row">
							<div class="col-4">
								<input type="text" name="search" class="form-control" placeholder="Question" value="<?php if(isset($search[0]) && $search[0]!='*') print $search[0]; ?>">
							</div>
							<div class="col-2">
								<select class="form-control" name="search_category">
									<option value="-1" selected>All categories</option>
									<?php foreach($categories as $category)
									{
										print '<option value="'.$category['id'].'"';
										if(isset($search[1]) && $search[1]==$category['id'])
											print ' selected';
										print '>'.$category['name'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="col-2">
								<select class="form-control" name="search_difficulty">
									<option value="0">All levels</option>
									<option value="1"<?php if(isset($search[3]) && $search[3]==1) print ' selected'; ?>>Easy</option>
									<option value="2"<?php if(isset($search[3]) && $search[3]==2) print ' selected'; ?>>Normal</option>
									<option value="3"<?php if(isset($search[3]) && $search[3]==3) print ' selected'; ?>>Hard</option>
								</select>
							</div>
							<div class="col-2">
								<select class="form-control" name="search_date">
									<option value="0">All categories</option>
									<option value="1"<?php if(isset($search[2]) && $search[2]==1) print ' selected'; ?>>DESC</option>
									<option value="2"<?php if(isset($search[2]) && $search[2]==1) print ' selected'; ?>>ASC</option>
								</select>
							</div>
							<div class="col-2">
								<button type="submit" class="btn btn-primary"><i class="fa fa-search fa-1" aria-hidden="true"></i> Search</button>
							</div>
						</div>
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="thead-inverse">
							<tr>
								<th>#</th>
								<th>Question</th>
								<th>Category</th>
								<th>Difficulty level</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$records_per_page=10;
								
								if(isset($search) && count($search))
								{
									$where=false;
									if($search[0]!='*')
									{
										$query = "SELECT * FROM questions WHERE question LIKE :search";
										$where = true;
									}
									else
										$query = "SELECT * FROM questions";
									if($search[1]>=0 && isset($cat[$search[1]]))
										if($where)
											$query.=" AND category = ".$search[1];
										else
										{
											$query.=" WHERE category = ".$search[1];
											$where = true;
										}
									if(($search[3]>0 && $search[3]<4))
									{
										if($where)
											$query.=" AND difficulty = ".$search[3];
										else
											$query.=" WHERE difficulty = ".$search[3];
									}
									$query.=" ORDER BY date ";

									if($search[2]==2)
										$query.="ASC";
									else
										$query.="DESC";

									$newquery = $paginate->paging($query,$records_per_page);
									$paginate->dataview($newquery, $search, $cat, $difficulty, 'Edit the question');
								} else {
									$query = "SELECT * FROM questions ORDER BY date DESC";
									$newquery = $paginate->paging($query,$records_per_page);
									$paginate->dataview($newquery, null, $cat, $difficulty, 'Edit the question');
								}
							?>
						</tbody>
					</table>
				</div>
				<p>
					<?php
						if(isset($search))
							$paginate->paginglink($query,$records_per_page,'First page','Last page',$site_url,$search);
						else
							$paginate->paginglink($query,$records_per_page,'First page','Last page',$site_url);
					?>
				</p>
            </div>
        </div>
    </div>
