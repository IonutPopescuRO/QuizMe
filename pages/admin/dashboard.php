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
                            <th> First name </th>
                            <th> Progress </th>
                            <th> Amount </th>
                            <th> Sales </th>
                            <th> Deadline </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="font-weight-medium"> 1 </td>
                            <td> Herman Beck </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td class="text-danger"> 53.64%
                              <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td class="font-weight-medium"> 2 </td>
                            <td> Messsy Adam </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $245.30 </td>
                            <td class="text-success"> 24.56%
                              <i class="mdi mdi-arrow-up"></i>
                            </td>
                            <td> July 1, 2015 </td>
                          </tr>
                          <tr>
                            <td class="font-weight-medium"> 3 </td>
                            <td> John Richards </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $138.00 </td>
                            <td class="text-danger"> 28.76%
                              <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td> Apr 12, 2015 </td>
                          </tr>
                          <tr>
                            <td class="font-weight-medium"> 4 </td>
                            <td> Peter Meggik </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 77.99 </td>
                            <td class="text-danger"> 53.45%
                              <i class="mdi mdi-arrow-down"></i>
                            </td>
                            <td> May 15, 2015 </td>
                          </tr>
                          <tr>
                            <td class="font-weight-medium"> 5 </td>
                            <td> Edward </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td> $ 160.25 </td>
                            <td class="text-success"> 18.32%
                              <i class="mdi mdi-arrow-up"></i>
                            </td>
                            <td> May 03, 2015 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>