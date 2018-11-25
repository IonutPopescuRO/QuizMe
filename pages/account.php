<div class="row">
<div class="col-md-3 grid-margin stretch-card"></div>
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Account settings</h4>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" value="<?php print $user_rows['userName']; ?>"> </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php print $user_rows['userEmail']; ?>" disabled> </div>

								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">+40</span>
										</div>
										<input type="number" class="form-control" name="phone" maxlength="9" value="<?php print $user_rows['userPhone']; ?>" disabled>
									</div>
								</div>
					  <div class="form-group">
                        <label for="exampleInputPassword4">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"> </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"> </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Repeat New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"> </div>
						
						<div class="form-check form-check-flat">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" checked=""> Receive mail from administrator <i class="input-helper"></i></label>
                        </div>
						
                      <button type="submit" class="btn btn-success mr-2">Save</button>
                    </form>
                  </div>
                </div>
              </div>
			 </div>