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
                        <h6>Member Table</h6>
                    </div>
                    <div class="col-lg-3 col-md-6 my-sm-auto ms-sm-4 me-sm-auto mx-auto mt-3">
                        {{--  button trigger modal  --}}
                        <button type="button" class="btn bg-gradient-success w-50" data-bs-toggle="modal"
                            data-bs-target="#modal-register">
                            Add New Member
                        </button>
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        </th>
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
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        {{--  button trigger modal  --}}
                                                        <button type="button"
                                                            class="btn bg-gradient-warning w-50 d-flex justify-content-center mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit{{ $item->id }}">
                                                            Edit
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <button
                                                            class="btn bg-gradient-danger w-50 d-flex justify-content-center"
                                                            onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit()">Delete</button>

                                                        <form id="delete-project-{{ $item->id }}"
                                                            action="{{ route('deleteUser', $item->id) }}" method="POST"
                                                            class="mb-0">
                                                            @csrf
                                                            @method('DELETE')
                                                    </div>
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
                                                                <h3 class="font-weight-bolder text-primary text-gradient">
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
                                                                            class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
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
                        <h6>Book Table</h6>
                    </div>
                    <div class="col-lg-3 col-md-6 my-sm-auto ms-sm-4 me-sm-auto mx-auto mt-3">
                        {{--  button trigger modal  --}}
                        <button type="button" class="btn bg-gradient-primary w-50" data-bs-toggle="modal"
                            data-bs-target="#modal-book">
                            Add New Book
                        </button>
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            action</th>

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
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        {{--  button trigger modal  --}}
                                                        <button type="button"
                                                            class="btn bg-gradient-warning w-50 d-flex justify-content-center mb-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit{{ $item->id }}">
                                                            Edit
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <button
                                                            class="btn bg-gradient-danger w-50 d-flex justify-content-center"
                                                            onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit()">Delete</button>

                                                        <form id="delete-project-{{ $item->id }}"
                                                            action="{{ route('deleteUser', $item->id) }}" method="POST"
                                                            class="mb-0">
                                                            @csrf
                                                            @method('DELETE')
                                                    </div>
                                                </div>
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
                        <h6>Borrowing Table</h6>
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
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->status }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-xs font-weight-bold mb-0">{{ $item->penalty }}</h6>
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
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">New Member</h3>
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
                                <label>Role</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="role">
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                                <label>Phone Number</label>
                                <div class="input-group mb-3">
                                    <input type="varchar" class="form-control" placeholder="Phone Number"
                                        aria-label="Phone Number" aria-describedby="phone-addon" name="phone">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal add new book --}}
    <div class="modal fade" id="modal-book" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Add Book</h3>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" method="POST" action="{{ route('addBook') }}">
                                @csrf
                                <label>Title</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Title" aria-label="Title"
                                        aria-describedby="title-addon" name="title">
                                </div>
                                <label>Category</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="category_id">
                                        @foreach ($book as $item)
                                            <option value="{{ $item->category->id }}">{{ $item->category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Author</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="author_id">
                                        @foreach ($book as $item)
                                            <option value="{{ $item->author->id }}">{{ $item->author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Stock</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Stock" aria-label="Stock"
                                        aria-describedby="stock-addon" name="stock">
                                </div>
                                <label>Published Year</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Published Year"
                                        aria-label="Published Year" aria-describedby="year-addon" name="year">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
