<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories</h4><hr>
				<form action="" method="post">
					<div class="form-group">
						<label for="months">Admins</label>
						<div class="row">
							<div class="col-5">
								<input class="form-control" name="name" placeholder="Email" type="text">
							</div>
							<div class="col-5">
								<button class="file-upload-browse btn btn-info" type="button">Add an admin +</button>
							</div>
						</div>
					</div>
				</form>
				<hr>
                <h4 class="card-title">Admins</h4><hr>
				<ul class="list-arrow">
				<?php
					print '<li>ionutpopescu10@yahoo.com <a href="app/admins&delete" onclick="return confirm(\'Are you sure?\');"><i style="color:red;" class="fa fa-trash-o fa-2" aria-hidden="true"></i></a></li>';
				?>
				</ul>
			</div>
        </div>
    </div>
</div>