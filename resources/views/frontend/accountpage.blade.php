@extends('frontend.layout.app')
@section('content')
    <section class="banner_about_us py_8" style="background-image: url({{ asset('public/frontend/img/account.webp') }});">
        <div class="container">
            <div class="row">
                <div class="text_about_us">
                    <h2>Account</h2>
                </div>
            </div>
        </div>
    </section>



    <section class="single_product_one py_8">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar mb-3">
                    <div class="account_left">
 <ul class="nav nav-pills flex-md-column flex-row justify-content-around" id="dashboardTabs"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active account_info" id="dashboard-tab" data-bs-toggle="pill"
                                data-bs-target="#dashboard" type="button" role="tab" aria-selected="true"><i
                                    class="fa fa-tachometer"></i>
                                Dashboard</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link account_info" id="orders-tab" data-bs-toggle="pill"
                                data-bs-target="#orders" type="button" role="tab" aria-selected="false" tabindex="-1"><i
                                    class="fa fa-shopping-cart"></i> Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link account_info" id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab" aria-selected="false" tabindex="-1"><i
                                    class="fa fa-user"></i>
                                Account Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <form action="https://printerithelp.com/user-logout" method="POST">
                                <input type="hidden" name="_token" value="CNLT0WVO5sf26gYeTViEbCWAuEjYUpp2YHquw4BU"
                                    autocomplete="off"> <button class="nav-link" id="logout-tab" type="submit" role="tab"
                                    aria-selected="false" tabindex="-1"><i class="fa fa-sign-out"></i>
                                    Logout</button>
                            </form>

                        </li>
                    </ul>
                    </div>                   
                    
                </div>

                <div class="col-md-9 tab-content" id="dashboardTabsContent">
                    <!-- Dashboard -->
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <h4>Dashboard</h4>
                        <p>Hello,
                            <strong>
                                jasmine
                            </strong>
                        </p>
                        <p>From your account dashboard you can check your recent orders, manage your address and edit your
                            account
                            info.</p>
                    </div>

                    <!-- Orders -->
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4>Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Account Details -->
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h4>Account Details</h4>
                        <form action="https://printerithelp.com/account-update" method="POST" class="mt-4">
                            <input type="hidden" name="_token" value="CNLT0WVO5sf26gYeTViEbCWAuEjYUpp2YHquw4BU"
                                autocomplete="off">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" name="name" value="jasmine"
                                        placeholder="jasmine">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="email" name="email" class="form-control" value="admin@gmail.com"
                                        placeholder="jasmine@gmail.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" name="phone" value="" placeholder="Phone">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" placeholder="Zip Code">
                                </div>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Address"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" placeholder="Select Country">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" placeholder="Select State">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" placeholder="Select City">
                                </div>
                            </div>
                            <div class="button_account">

                                <button type="submit" class="btn_theme mt-3 btn_blog">Save Changes</button>
                            </div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="logout" role="tabpanel">
                        <h4>You have been logged out.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection