<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style>
        body {
            margin-top: 50px;
            background-color: #f1f1f1;
        }

        .head {
            padding: 5px 15px;
            border-radius: 3px 3px 0px 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Create New Post</h2>
        <form action="{{route('photo.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>File</label>
                <input type="file" name="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>