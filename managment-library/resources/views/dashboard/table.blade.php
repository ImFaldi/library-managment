@extends('layouts.dashboard')

@section('title', 'Table')

@section('sidebar-table', 'active')

@section('page', 'Table')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6>Member Table</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn bg-gradient-success btn-sm mb-0"type="button"
                                    class="btn bg-gradient-success w-50 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-register">
                                    <i class="fas fa-plus" style="font-size: 14px;"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Phone</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->role }}</p>
                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->phone }}</h6>
                                            </td>
                                            <td>
                                                <div class="col-lg-6 col-md-6">
                                                    {{--  button trigger modal  --}}
                                                    <button type="button"
                                                        class="btn bg-gradient-warning w-50 d-flex justify-content-center btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit{{ $item->id }}">
                                                        Edit
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- modal edit member --}}
                                        <div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h3 class="font-weight-bolder text-warning text-gradient">
                                                                    Edit</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" method="POST"
                                                                    action="{{ route('updateUser', $item->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <label>Name</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Name" aria-label="Name"
                                                                            aria-describedby="name-addon" name="name"
                                                                            value="{{ $item->name }}">
                                                                    </div>
                                                                    <label>Email</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Email" aria-label="Email"
                                                                            aria-describedby="email-addon" name="email"
                                                                            value="{{ $item->email }}">
                                                                    </div>
                                                                    <label>Role</label>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-control" name="role"
                                                                            value="{{ $item->role }}">
                                                                            <option value="member">Member</option>
                                                                        </select>
                                                                    </div>
                                                                    <label>Phone Number</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="varchar" class="form-control"
                                                                            placeholder="Phone Number"
                                                                            aria-label="Phone Number"
                                                                            aria-describedby="phone-addon" name="phone"
                                                                            value="{{ $item->phone }}">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit"
                                                                            class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6>Book Table</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn bg-gradient-success btn-sm mb-0"type="button"
                                    class="btn bg-gradient-success w-50 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-register">
                                    <i class="fas fa-plus" style="font-size: 14px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Category</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Book Author</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Stock</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Published Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($book as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->title }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->category->title }}</p>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->author->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->stock }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->year }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6>Borrow Table</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn bg-gradient-success btn-sm mb-0"type="button"
                                    class="btn bg-gradient-success w-50 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-register">
                                    <i class="fas fa-plus" style="font-size: 14px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Member Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Book Title</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Borrow Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Return Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Penalty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrow as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->User->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->book->title }}</p>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->borrow_date }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->return_date }}</h6>
                                            </td>
                                            <td>
                                                @if ($item->status == 'borrowed')
                                                    <span class="badge badge-sm bg-gradient-warning">Borrowed</span>
                                                @elseif($item->status == 'returned')
                                                    <span class="badge badge-sm bg-gradient-success">Returned</span>
                                                @endif
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">
                                                    @foreach ($penalty as $item2)
                                                        @if ($item->id == $item2->id)
                                                            Rp {{ $item2->penalty }}
                                                        @else
                                                            Rp 0
                                                        @endif
                                                    @endforeach
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal add new member --}}
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-form-add-member"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-success text-gradient">Add Member</h3>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="POST" action="{{ route('register') }}">
                                @csrf
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        aria-describedby="name-addon" name="name">
                                </div>
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="email-addon" name="email">
                                </div>
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" aria-describedby="password-addon" name="password">
                                </div>
                                <label>Phone Number</label>
                                <div class="input-group mb-3">
                                    <input type="varchar" class="form-control" placeholder="Phone Number"
                                        aria-label="Phone Number" aria-describedby="phone-addon" name="phone">
                                        <input type="hidden" class="form-control" name="role" value="member">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-success btn-lg w-100 mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-success text-gradient">Add Member</h3>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="POST" action="{{ route('register') }}">
                                @csrf
                                <label>Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        aria-describedby="name-addon" name="name">
                                </div>
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="email-addon" name="email">
                                </div>
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" aria-describedby="password-addon" name="password">
                                </div>
                                <label>Phone Number</label>
                                <div class="input-group mb-3">
                                    <input type="varchar" class="form-control" placeholder="Phone Number"
                                        aria-label="Phone Number" aria-describedby="phone-addon" name="phone">
                                        <input type="hidden" class="form-control" name="role" value="member">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-success btn-lg w-100 mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
