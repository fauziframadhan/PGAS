@extends('Layout.admin')

@section('content')
<body>
    <h1 class="text-center mb-4">Add Spending</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-8">
                <div class="card-body">
                    <form action="/insertspending" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="employeeid" class="form-label">EmployeeID</label>
                            <select class="form-select" id="employeeid" name="employeeid" aria-label="Default select example">
                              <option selected>Choose EmployeeID</option>
                              @foreach ($dataemployee as $data)
                                <option value="{{$data->employeeid}}">{{$data->employeeid}}</option>
                              @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Value</label>
                            <input type="number" class="form-control" id="value" name="value" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
</body>
@endsection