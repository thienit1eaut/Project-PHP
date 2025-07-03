@extends('layout')
@section('title','Profile')
@section('main')
    <section class="section profile mt-5 px-2">
        {{-- success message --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show container" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
            <strong>{{session('error')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="row justify-content-center">
            {{-- profile left side --}}
            <div class="col-lg-3 col-12 mx-2">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (!Auth::user()->image)
                        <img class="" src="{{asset('images/noimage.png')}}" alt="" width="250" height="250">
                        @else
                        <img class="rounded-circle img-thumbnail" src="{{asset('storage/profile/' . Auth::user()->image)}}" alt="" width="250" height="250">
                        @endif
                        <h2>{{Auth::user()->name}}</h2>
                    <div class="social-link mt-2">
                        <a href="#" class="me-2"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="me-2"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="me-2"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="me-2"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
                </div>
            </div>
            {{-- profile right  --}}
            <!-- Card Layout-->
<div class="col-lg-8 mt-3 mt-lg-0">
    <div class="card">
        <div class="card-body pt-3">

            <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab"
                        data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                        Profile</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                        Password</button>
                </li>

            </ul>

            <div class="tab-content pt-2">
                <!-- Overview Tab -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title my-3">Profile Details</h5>

                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Name:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->name}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Role:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->role}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Email:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->email}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Gender:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->gender}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Age:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->age}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Phone:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->phone}}</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-3 col-md-4 fw-bold label ">Address:</div>
                        <div class="col-lg-9 col-md-8 fw-semibold text-muted">{{Auth::user()->address}}</div>
                    </div>
                </div>
                <!-- End Overview Tab -->

                <!-- Edit Profile Tab -->
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    {{-- profile image --}}
                    @if (!Auth::user()->image)
                        <img class="" src="{{asset('images/noimage.png')}}" alt="" width="150" height="150">
                        @else
                        <img class="rounded-circle img-thumbnail mb-2" src="{{asset('storage/profile/' . Auth::user()->image)}}" alt="" width="150" height="150">
                        @endif

                   <form action="{{route('profile.edit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- image --}}
                    <div class="mb-3 row">
                        <label for="image" class="form-label col-3 col-xxl-2">Image Upload</label>
                        <div class="col-8 col-md-6">
                            <input type="file" name="image" value="{{old('name',Auth::user()->name)}}" class="form-control @error('image') is-invalid @enderror" id="name" placeholder="Enter your image . . .">
                        @error('image')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>

                      </div>

                    {{-- name --}}
                    <div class="mb-3 row">
                        <label for="name" class="form-label col-3 col-xxl-2">Name</label>
                        <div class="col-8 col-md-6">
                            <input type="text" name="name" value="{{old('name',Auth::user()->name)}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name . . .">
                          @error('name')
                            <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                      </div>

                      {{-- gender --}}
                      <div class="mb-3 row">
                        <label for="name" class="form-label col-3 col-xxl-2">Gender</label>
                        <div class="col-8 col-md-6">
                            <select class="form-select @error('gender') is-invalid @enderror" aria-label="Default select example" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if(Auth::user()->gender == 'female') selected @endif >Female</option>
                            </select>
                            @error('gender')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>

                      </div>

                      {{-- age --}}
                    <div class="mb-3 row">
                        <label for="age" class="form-label col-3 col-xxl-2">Age</label>
                        <div class="col-8 col-md-6">
                            <input type="number" max="100" name="age" value="{{old('name',Auth::user()->age)}}" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Enter your age . . .">
                            @error('age')
                            <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                      </div>

                       {{-- phone --}}
                    <div class="mb-3 row">
                        <label for="phone" class="form-label col-3 col-xxl-2">Phone</label>
                        <div class="col-8 col-md-6">
                            <input type="number" name="phone" value="{{old('name',Auth::user()->phone)}}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone . . .">
                           @error('phone')
                          <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                      </div>

                         {{-- address --}}
                    <div class="mb-3 row">
                        <label for="address" class="form-label col-3 col-xxl-2">Address</label>
                        <div class="col-8 col-md-6">
                            <textarea name="address" id="" class="form-control" rows="3" placeholder="Enter your address">{{old('address',Auth::user()->address)}}</textarea>
                        </div>
                      </div>

                      <div class="float-end col-md-4 col-xl-5">
                        <button class="btn btn-primary">Update</button>
                      </div>
                   </form>

                </div>

                <!-- End Edit Profile Tab -->

                <!-- Change Password Tab -->
                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <form action="{{route('profile.password')}}" method="POST">
                        @csrf
                        {{-- name --}}
                        <div class="mb-3 row">
                            <label for="password" class="form-label col-3 col-xxl-2">Old Password</label>
                            <div class="col-8 col-md-6">
                                <input type="password" name="oldPassword" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter your old password . . .">
                                @error('oldPassword')
                                <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="nnewPasswordame" class="form-label col-3 col-xxl-2">New Password</label>
                            <div class="col-8 col-md-6">
                                <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" placeholder="Enter your new password . . .">
                                @error('newPassword')
                                <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="confirmPassword" class="form-label col-3 col-xxl-2">Confirm Password</label>
                            <div class="col-8 col-md-6">
                                <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" id="name" placeholder="Enter your confirm password . . .">
                                @error('confirmPassword')
                                <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                          </div>
                          <div class="float-end col-md-4 col-xl-5">
                            <button class="btn btn-primary">Update</button>
                          </div>
                       </form>
                </div>
                <!-- End Change Password Tab -->
            </div>

        </div>
    </div>
</div>
<!-- End Card Layout-->
        </div>
    </section>
@endsection
