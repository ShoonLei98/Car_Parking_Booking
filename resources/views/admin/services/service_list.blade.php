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
                <h3 class="card-title">
                    <a href="{{ route('service#add') }}"><button class="btn btn-sm btn-outline-dark"> Add Additional Services</button></a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Services</th>
                      <th>Price</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($service as $item)

                  <tr>
                    <td>{{ $item->service_id }}</td>
                    <td>{{ $item->service_name }}</td>
                    <td>{{ $item->service_price}}</td>

                    <td>
                        <a href="{{ route('services#edit', $item->service_id) }}">
                            <button class="btn btn-sm bg-primary text-white">Edit</button>
                        </a>
                        <a href="{{ route('service#delete', $item->service_id) }}">
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
