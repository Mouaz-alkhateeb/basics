<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Bordered Table</h2>
        <h2 class="text-center">Import File excel</h2>
        <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Excel File</label>
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" class="modal-effect btn btn-sm btn-dark m-2">Import Excel</button>
        </form>
        <a class="modal-effect btn btn-sm btn-dark m-2" href="{{ url('pdf') }}">Export Pdf</a>
        <a class="modal-effect btn btn-sm btn-dark m-2" href="{{ url('excel') }}">Export Excel</a>
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>