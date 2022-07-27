@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
{{--
        @if (Session::has('deleteSuccess'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ Session::get('deleteSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif --}}
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <button class="btn btn-sm btn-outline-dark">User List</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($user as $item)

                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>

                    <td>
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
