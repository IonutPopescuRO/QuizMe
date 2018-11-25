<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">QR Code Generator</h4><hr>
				<form action="" method="post">
					<div class="form-group">
						<label for="months">Active events</label>
						<form action="" method="">
							<div class="row">
								<div class="col-1"></div>
								<div class="col-3">
									<select class="form-control" name="event">
										<?php foreach($all_events as $event) print '<option value="'.$event['id'].'">'.$event['name'].'</option>'; ?>
									</select>
								</div>
								<div class="col-4">
									<input class="form-control" name="count" type="number" value="1">
								</div>
								<div class="col-4">
									<button class="file-upload-browse btn btn-info" type="submit">Generate</button>
								</div>
							</div>
						</form>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>