<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Updated Images</title>
</head>
<body>

    <div id="app"></div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Picture</label>
        <input type="file" name="picture">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>
