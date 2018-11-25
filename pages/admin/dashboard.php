<div class="row">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">QR codes used</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php print $user->qrCodesCount(); ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">Quizzes</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php print $user->quizzesCount(); ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <i class="mdi mdi-poll-box text-success icon-lg"></i>
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">Answers</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php print $user->answersCount(); ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <i class="mdi mdi-account-location text-info icon-lg"></i>
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">Users</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php print $user->usersCount(); ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div></div></div>
			
<div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Most Active Users</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Quizzes </th>
                            <th> Phone </th>
                          </tr>
                        </thead>
                        <tbody>
						<?php foreach($user->getUsers() as $key => $x) { ?>
                          <tr>
                            <td class="font-weight-medium"> <?php print ($key+1); ?> </td>
                            <td> <?php print $x['userName']; ?></td>
                            <td> <a href="mailto:<?php print $x['userEmail']; ?>" target="_top"><?php print $x['userEmail']; ?></a></td>
                            <td> <?php print $user->usersQuizzesCount($x['userID']); ?></td>
                            <td> +4<?php print $x['userPhone']; ?></td>
                          </tr>
						<?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>