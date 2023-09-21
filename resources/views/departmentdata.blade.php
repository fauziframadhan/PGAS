@extends('Layout.admin')

@push('css')
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            <div class="flex">
                <a href="/adddepartment" type="button" class="btn btn-success">Add +</a>
            </div>
            {{-- {{Session::get('page_url')}} --}}
            <div class="mb-3 mt-3 col-4">
                <form action="/department" method="GET">
                  <label for="search" class="form-label">Search Data</label>
                  <input type="search" class="form-control" name="search" id="search">
                </form>
            </div>
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <div class="row">
                {{-- @if ($message = Session::get('Success'))
                     <div class="alert alert-success" role="alert">
                        {{$message}}
                    </div> 
                @endif --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data1 as $row)
                        <tr>
                            <th scope="row">{{$row->departmentid}}</th>
                            <td>{{$row->name}}</td>
                            <td>
                                <a href="/showdepartment/{{$row->departmentid}}" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{$row->departmentid}}" data-name="{{$row->name}}">Delete</a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 


    </div>

@endsection

@push('scripts')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
<script>

    $('.delete').click(function(){
        var departmentid = $(this).attr('data-id');
        var name = $(this).attr('data-name');
            swal({
            title: "Are you sure?",
            text: "With the Name of "+name+" ",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location="/deletedepartment/"+departmentid+""
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });

    
</script>

<script>
    @if (Session::has('Success'))
    toastr.success("{{Session::get('Success')}}");

    @endif
</script>

<script>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</script>
    
@endpush