<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories</h4><hr>
				<form action="" method="post">
					<div class="form-group">
						<label for="months">Category name</label>
						<div class="row">
							<div class="col-5">
								<input class="form-control" name="name" type="text">
							</div>
							<div class="col-5">
								<button class="file-upload-browse btn btn-info" type="button">Add category +</button>
							</div>
						</div>
					</div>
				</form>
				<?php if($categories && count($categories)) { ?>
				<hr>
                <h4 class="card-title">Categories</h4><hr>
				<ul class="list-arrow">
				<?php
					foreach($categories as $category)
						print '<li>'.$category['name'].' <a href="app/categories&delete='.$category['id'].'" onclick="return confirm(\'Are you sure?\');"><i style="color:red;" class="fa fa-trash-o fa-2" aria-hidden="true"></i></a></li>';
				?>
				</ul>
				<?php } ?>
			</div>
        </div>
    </div>
</div>