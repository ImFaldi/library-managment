@extends('layouts.dashboard')

@section('title', 'Resepsionis')

@section('sidebar-dashboard', 'active')

@section('page', 'Resepsionis')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Book</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_book }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-2">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Borrowed</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_borrow }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Borrow Status</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            @foreach ($borrow as $item)
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Borrow Date :
                                            {{ $item->borrow_date }}</h6>
                                        <span class="text-xs">Id Borrow: {{ $item->id }}</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        {{-- <span class="badge badge-sm bg-gradient-warning">Borrowed</span> --}}
                                        @if ($item->status == 'borrowed')
                                            <span class="badge badge-sm bg-gradient-warning">Borrowed</span>
                                        @elseif($item->status == 'returned')
                                            <span class="badge badge-sm bg-gradient-success">Returned</span>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Return Date :
                                            {{ $item->return_date }}</h6>
                                        {{-- <span class="text-xs">Penalty : Rp. {{ $item->penalty }}</span> --}}
                                        @if ($item->return_date < $date_now && $item->status == 'borrowed')
                                            <span class="text-xs">Penalty : Rp. {{ $item->penalty }}</span>
                                        @endif
                                        
                                        @if ($item->return_date > $date_now && $item->status == 'borrowed')
                                            <span class="text-xs">Penalty : don't have a penalty</span>
                                        @endif

                                        @if ($item->return_date < $date_now && $item->status == 'returned')
                                            <span class="text-xs">Penalty : Paid</span>
                                        @endif

                                        @if ($item->return_date > $date_now && $item->status == 'returned')
                                            <span class="text-xs">Penalty : Paid</span>
                                        @endif
                                    </div>

                                    @if ($item->status == 'borrowed')
                                        <div class="d-flex align-items-center text-sm">
                                            <button class="btn bg-gradient-success btn-sm mb-0" data-bs-toggle="modal"
                                                data-bs-target="#modal-return{{ $item->id }}">Return</button>
                                        </div>
                                    @elseif($item->status == 'returned')
                                        <div class="d-flex align-items-center text-sm">
                                            <button class="btn btn-outline-default btn-sm mb-0" disabled>Return</button>
                                        </div>
                                    @endif
                                </li>
                                <hr>
                                <div class="modal fade" id="modal-return{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-title-return" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-return">Your attention is required
                                                </h6>
                                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('borrow.return', $item->id) }}" method="POST">
                                                <div class="py-3 text-center">
                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                    <h4 class="text-gradient text-warning mt-4">Warning</h4>
                                                    <p>Are you sure you want to return this book?</p>
                                                    @if ($item->return_date < $date_now && $item->status == 'borrowed')
                                                        <p class="text-danger">You have a penalty of Rp.
                                                            {{ $item->penalty }}</p>
                                                        <input type="hidden" name="penalty" value="{{ $item->penalty }}">
                                                    @endif
                                                    @if ($item->return_date > $date_now && $item->status == 'borrowed')
                                                        <p class="text-success">You don't have a penalty</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Return</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Borrow History</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <button class="btn bg-gradient-success btn-sm mb-0">Add Borrow</button>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                                <ul class="list-group">
                                    @foreach ($borrow as $item)
                                        @if ($date_now == $item->borrow_date)
                                            <li
                                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                <div class="d-flex align-items-center">
                                                    <button
                                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                            class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark text-sm">Book : {{ $item->book->title }}
                                                        </h6>
                                                        <span class="text-xs">Borrow Date : {{ $item->borrow_date }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                                <ul class="list-group">
                                    @foreach ($borrow as $item)
                                        @if ($date_yesterday == $item->borrow_date)
                                            <li
                                                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                <div class="d-flex align-items-center">
                                                    <button
                                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                            class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-1 text-dark text-sm">Book : {{ $item->book->title }}
                                                        </h6>
                                                        <span class="text-xs">Borrow Date :
                                                            {{ $item->borrow_date }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
        </footer>
    </div>

@endsection
