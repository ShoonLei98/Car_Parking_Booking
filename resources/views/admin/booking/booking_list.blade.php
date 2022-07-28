@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (Session::has('createSuccess'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('createSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

        @if (Session::has('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ Session::get('updateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

        @if (Session::has('deleteSuccess'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ Session::get('deleteSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-1">
                    <a href="{{ route('customer#list') }}"><button class="btn btn-sm btn-outline-dark"> Add Booking</button></a>
                </h3>

                <div class="card-tools mt-2">
                    <form action="" method="get">
                        @csrf
                        <div class="input-group input-group-sm bg-gray me-5" style="width: 200px;">
                            <input type="text" name="searchBooking" class="form-control float-right" placeholder="Enter Name or Email or CarNumber" value="">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                        </div>
                    </form>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Email</th>
                      <th>Car Number</th>
                      <th>Additional Services</th>
                      <th>Note</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($booking as $item)

                  <tr>
                    <td>{{ $item->booking_id }}</td>
                    <td>{{ $item->booking_date}}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->car_number }}</td>
                    <td>{{ $item->service_id }}</td>
                    <td>{{ $item->note }}</td>

                    <td>
                        <a href="">
                            <button class="btn btn-sm bg-warning text-black">Pick Up</button>
                        </a>
                        <a href="">
                            <button class="btn btn-sm bg-primary text-white">Edit</button>
                        </a>
                        <a href="">
                            <button class="btn btn-sm bg-danger text-white">Delete</button>
                        </a>
                    </td>
                  </tr>

                  @endforeach
                </tbody>
                </table>

                {{-- <div class="mt-3 ms-3">{{ $admin->links() }}</div> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
