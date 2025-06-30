<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                     
                    <!--end::Row--> <!--begin::Row-->
                    <div class="row"> <!-- Start col -->
                        <div class="col-lg-7 connectedSortable">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Sales Value</h3>
                                </div>
                                <div class="card-body">
                                    <div id="revenue-chart"></div>
                                </div>
                            </div> <!-- /.card --> 
                           
                           
                        </div> <!-- /.Start col --> <!-- Start col -->
                        <div class="col-lg-5 connectedSortable">
                            <div class="card text-white bg-primary bg-gradient border-primary mb-4">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Sales Value</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-primary btn-sm" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> </div>
                                </div>
                                <div class="card-body">
                                    <div id="world-map" style="height: 220px"></div>
                                </div>
                                <div class="card-footer border-0"> <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div id="sparkline-1" class="text-dark"></div>
                                            <div class="text-white">Visitors</div>
                                        </div>
                                        <div class="col-4 text-center">
                                            <div id="sparkline-2" class="text-dark"></div>
                                            <div class="text-white">Online</div>
                                        </div>
                                        <div class="col-4 text-center">
                                            <div id="sparkline-3" class="text-dark"></div>
                                            <div class="text-white">Sales</div>
                                        </div>
                                    </div> <!--end::Row-->
                                </div>
                            </div>
                        </div> <!-- /.Start col -->
                    </div> <!-- /.row (main row) -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main>