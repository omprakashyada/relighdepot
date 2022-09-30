<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new-file-uploading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="uploadnewfile.php" method="POST" enctype='multipart/form-data' >
        <div class="container">
            <div class="row">
                <div class="col-sm-5"  style="margin:10px auto"> 
                    <div class="mb-3">
                        <label for="formFile" class="form-label">file upload</label>
                        <input class="form-control" type="file" id="formFile" name="uploadfile" accept='.csv'>
                        <input class="form-control btn btn-success mt-3" type="submit" id="formFile" name="submit" value="submit"  style="width:100px !important" >
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>


