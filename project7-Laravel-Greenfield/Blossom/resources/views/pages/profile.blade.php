 @extends('layouts.shopTemp')
 @section('shop_content')

 <!-- Breadcrumb Area Start Here -->
 <div class="breadcrumbs-area position-relative">
     <div class="container">
         <div class="row">
             <div class="col-12 text-center">
                 <div class="breadcrumb-content position-relative section-content">
                     <h3 class="title-3">My Account</h3>
                     <ul>
                         <li><a href="index">Home</a></li>
                         <li>My Account</li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Breadcrumb Area End Here -->
 <!-- my account wrapper start -->
 <div class="my-account-wrapper mt-no-text">
     <div class="container container-default-2 custom-area">
         <div class="row">
             <div class="col-lg-12 col-custom">
                 <!-- My Account Page Start -->
                 <div class="myaccount-page-wrapper">
                     <!-- My Account Tab Menu Start -->
                     <div class="row">
                         <div class="col-lg-3 col-md-4 col-custom">
                             <div class="myaccount-tab-menu nav" role="tablist">
                                 <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                     Dashboard</a>
                                 <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>



                                 <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                 <a href="logout"><i class="fa fa-sign-out"></i> Logout</a>
                             </div>
                         </div>
                         <!-- My Account Tab Menu End -->

                         <!-- My Account Tab Content Start -->
                         <div class="col-lg-9 col-md-8 col-custom">
                             <div class="tab-content" id="myaccountContent">
                                 <!-- Single Tab Content Start -->
                                 <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                     <div class="myaccount-content">
                                         <h3>Dashboard</h3>
                                         <div class="welcome">
                                             <p>Hello, <strong>{{$userId['name']}}</strong> (If Not <strong>{{$userId['name']}} !</strong><a href="logout" class="logout"> Logout</a>)</p>
                                         </div>
                                         <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                     </div>
                                 </div>
                                 <!-- Single Tab Content End -->

                                 <!-- Single Tab Content Start -->
                                 <div class="tab-pane fade" id="orders" role="tabpanel">
                                     <div class="myaccount-content">
                                         <h3>Your Last Order Products</h3>
                                         <div class="myaccount-table table-responsive text-center">
                                             <table class="table table-bordered">
                                                 <thead class="thead-light">
                                                     <tr>
                                                         <th>Products</th>
                                                         <th>Image</th>
                                                         <th>Date</th>
                                                         <th>Total</th>

                                                     </tr>
                                                 </thead>
                                                 <tbody>

                                                     @foreach($userProducts as $value)
                                                     <tr>
                                                         <td>{{$value->product_name}}</td>
                                                         <td style=" width: 12rem; height: 8rem;"><img style=" width: 12rem; height: 8rem;" src="/images/{{$value->product_image}}" alt=""></td>
                                                         <td>{{$value->created_at}}</td>

                                                         <td>JOD{{$value->product_price}}</td>
                                                     </tr>
                                                     @endforeach
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- Single Tab Content End -->

                                 <!-- Single Tab Content Start -->

                                 <!-- Single Tab Content End -->

                                 <!-- Single Tab Content Start -->

                                 <!-- Single Tab Content End -->

                                 <!-- Single Tab Content Start -->

                                 <!-- Single Tab Content End -->

                                 <!-- Single Tab Content Start -->
                                 <div class="tab-pane fade" id="account-info" role="tabpanel">
                                     <div class="myaccount-content">
                                         <h3>Account Details</h3>
                                         <div class="account-details-form">
                                             <form action="{{ route('account.update', $userId->id) }}" method="POST">
                                                 {{csrf_field()}}
                                                 @method('PATCH')
                                                 <div class="row">
                                                     <div class="col-lg-12 col-custom">
                                                         <div class="single-input-item mb-3">
                                                             <label for="first-name" class="required mb-1">First Name</label>
                                                             <input type="text" value="{{$userId['name']}}" name="name" id="first-name" placeholder="First Name" />
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="single-input-item mb-3">
                                                     <label for="email" class="required mb-1">Email Addres</label>
                                                     <input type="email" value="{{$userId['email']}}" name="email" id="email" placeholder="Email Address" />
                                                 </div>
                                                 <div class="single-input-item single-item-button">
                                                     <button type="submit" class="btn flosun-button secondary-btn theme-color  rounded-0">Save Changes</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div> <!-- Single Tab Content End -->
                             </div>
                         </div> <!-- My Account Tab Content End -->
                     </div>
                 </div> <!-- My Account Page End -->
             </div>
         </div>
     </div>
 </div>
 @endsection
 <!-- my account wrapper end -->