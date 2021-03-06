<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Events</h4>
				<?php if($info==1) print '<div class="alert alert-success alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
											  The event has been added.
											</div>'; 
				?>
				<p>
					<a class="btn btn-primary" data-toggle="collapse" href="#questions" role="button" aria-expanded="false" aria-controls="questions">
						Add events<i class="mdi mdi-plus"></i>
					</a>
				</p>
				<div class="collapse" id="questions">
					<div class="card card-body">
						<form action="" method="post">
							<div class="form-group">
								<div class="questions_container">
									<div>
										<div class="form-group">
											<label for="months">Name</label>
											<input type="text" name="name" class="form-control" placeholder="Name...">
										</div>
										
										<div class="form-group">
											<a class="btn btn-primary" role="button" data-toggle="collapse" href="#time" aria-expanded="false" aria-controls="time">
												Expiration date
											</a>
											<div class="collapse" id="time">
												<div class="form-group"><br>
													<input size="16" type="text" value="" name="expire" readonly class="form_datetime form-control">
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label for="months">Type</label>
											<select class="form-control" name="quiz_type">
												<option value="0" selected>Test (with score)</option>
												<option value="1">FeedBack (without score)</option>
											</select>
										</div>
					
										<div class="form-group">
											<label for="months">Questions</label>
											<select class="form-control" name="questions_rules" onchange="questions(this);">
												<option value="0" selected>Automatically</option>
												<option value="1">Manual</option>
											</select>
										</div>
										
										<div class="form-group" id="auto">
											<label for="months">Automatically - Questions</label>
											<div class="form-group">
												<div class="row">
													<div class="col-8">
														<div class="table-responsive">
															<table class="table table-hover">
																<thead>
																	<tr>
																		<th>Category</th>
																		<th>Difficulty</th>
																		<th>Questions</th>
																		<th>Available</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																		$questions_count = $questions->countAllQuestions();
																		foreach($questions_count as $key=>$row) {
																	?>
																	<tr>
																		<td><?php print $cat[$row['id']]; ?></td>
																		<td><?php print $difficulty[$row['type']]; ?></td>
																		<td class="text-danger">
																			<input type="number" name="auto_<?php print $row['id'].'_'.$row['type']; ?>" class="form-control" value="<?php print $row['count']; ?>" max="<?php print $row['count']; ?>">
																		</td>
																		<td>
																			<label class="badge badge-info"><?php print $row['count']; ?></label>
																		</td>
																	</tr>
																	<?php } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group" id="manual" style="display: none;">
											<label for="months">Manual - Questions</label>
											<ul class="nav nav-tabs tab-basic" role="tablist">
												<?php foreach($categories as $key => $category) { ?>
												<li class="nav-item">
													<a class="nav-link<?php if(!$key) print ' active show'; ?>" id="category_tab<?php print $category['id']; ?>" data-toggle="tab" href="#category<?php print $category['id']; ?>" role="tab" aria-controls="category<?php print $category['id']; ?>" aria-selected="false"><?php print $category['name']; ?></a>
												</li>
												<?php } ?>
											</ul>
											<div class="tab-content tab-content-basic">
												<?php
													$q = $questions->getAllQuestions();
													foreach($categories as $key => $category) 
													{
												?>
												<div class="tab-pane fade<?php if(!$key) print ' active show'; ?>" id="category_tab<?php print $category['id']; ?>" role="tabpanel" aria-labelledby="category_tab<?php print $category['id']; ?>">
													<div class="vertical-tab"><br>
														<ul class="nav nav-tabs tab-solid tab-solid-info mr-4" role="tablist">
															<?php if(isset($q[$category['id']][1])) { ?>
															<li class="nav-item">
																<a class="nav-link active" id="diff-tab-<?php print $category['id']; ?>-1" data-toggle="tab" href="#diff-<?php print $category['id']; ?>-1" role="tab" aria-controls="diff-<?php print $category['id']; ?>-1" aria-selected="true">Easy</a>
															</li>
															<?php } if(isset($q[$category['id']][2])) { ?>
															<li class="nav-item">
																<a class="nav-link" id="diff-tab-<?php print $category['id']; ?>-2" data-toggle="tab" href="#diff-<?php print $category['id']; ?>-2" role="tab" aria-controls="diff-<?php print $category['id']; ?>-2" aria-selected="true">Normal</a>
															</li>
															<?php } if(isset($q[$category['id']][3])) { ?>
															<li class="nav-item">
																<a class="nav-link" id="diff-tab-<?php print $category['id']; ?>-3" data-toggle="tab" href="#diff-<?php print $category['id']; ?>-3" role="tab" aria-controls="diff-<?php print $category['id']; ?>-3" aria-selected="true">Hard</a>
															</li>
															<?php } ?>
														</ul>
														<div class="tab-content tab-content-solid">
														<?php for($dif=1;$dif<=3;$dif++) if(isset($q[$category['id']][$dif])) { ?>
															<div class="tab-pane fade<?php if($dif==1) print ' active show'; ?>" id="diff-<?php print $category['id']; ?>-<?php print $dif; ?>" role="tabpanel" aria-labelledby="diff-tab-<?php print $category['id'].'-'.$dif; ?>">
																<br>
																<?php 
																	foreach($q[$category['id']][$dif] as $key=>$z)
																	{
																?>
																<div class="form-group">
																	<div class="row">
																		<div class="col-1"></div>
																		<div class="col-1">
																			<input type="checkbox" class="form-check-input" name="manual_<?php print $key; ?>">
																		</div>
																		<div class="col-10"><p><?php print $z; ?></p></div>
																	</div>
																</div><hr>
																<?php
																	}
																?>
															</div>
														<?php } ?>
														</div>
													</div>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<button class="add_form_field file-upload-browse btn btn-info" type="submit">Add event</button>
							</div>
						</form>

					</div>

					</div>
				</div>
				

				<div class="jumbotron jumbotron-fluid" style="padding: 1rem 2rem;">
					<form action="" method="POST">
						<div class="row">
							<div class="col-1"></div>
							<div class="col-4">
								<input type="text" name="search" class="form-control" placeholder="Event" value="<?php if(isset($search[0]) && $search[0]!='*') print $search[0]; ?>">
							</div>
							<div class="col-2">
								<select class="form-control" name="search_status">
									<option value="0">Any status</option>
									<option value="1"<?php if(isset($search[3]) && $search[3]==1) print ' selected'; ?>>In progress</option>
									<option value="2"<?php if(isset($search[3]) && $search[3]==2) print ' selected'; ?>>In coming</option>
									<option value="3"<?php if(isset($search[3]) && $search[3]==3) print ' selected'; ?>>Expired</option>
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
								<th>Status</th>
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
										$query = "SELECT * FROM events WHERE question LIKE :search";
										$where = true;
									}
									else
										$query = "SELECT * FROM events";
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
									$paginate->dataview($newquery, $search, $cat, $status, 'Edit the event');
								} else {
									$query = "SELECT * FROM events ORDER BY date DESC";
									$newquery = $paginate->paging($query,$records_per_page);
									$paginate->dataview($newquery, null, $cat, $status, 'Edit the event');
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
