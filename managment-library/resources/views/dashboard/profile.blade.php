@extends('layouts.dashboard')

@section('title', 'Profile')

@section('sidebar-profile', 'active')

@section('page', 'Profile')

@section('content')

    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?php echo Auth::user()->name; ?>
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            <?php echo Auth::user()->email; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    {{--  button trigger modal  --}}
                    <button type="button" class="btn bg-gradient-primary w-50" data-bs-toggle="modal"
                        data-bs-target="#modal-edit{{ Auth::user()->id }}">
                        Edit Profile
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert" style="color: white">
                <span class="alert-icon"><i class="ni ni-exclamation"></i></span>
                <span class="alert-text"><strong>Updated!</strong>
                    {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{--  modal  --}}
    <div class="modal fade" id="modal-edit{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-primary text-gradient">Edit</h3>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="POST"
                                action="{{ route('updateProfile', Auth::user()->id) }}">
                                @csrf
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        aria-describedby="name-addon" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="email-addon" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <label>Role</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="role" value="{{ Auth::user()->role }}">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <label>Phone Number</label>
                                <div class="input-group mb-3">
                                    <input type="varchar" class="form-control" placeholder="Phone Number"
                                        aria-label="Phone Number" aria-describedby="phone-addon" name="phone"
                                        value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
