<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Files PHP | Jago Ngoding</title>
</head>

<body>
    <h1>Upload Multiple Files PHP | Jago Ngoding</h1>
    <form action="script.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Pilih gambar</label> <br>
            <input type="file" name="listGambar[]" multiple>
        </div>

        <button style="margin-top: 2rem">Upload</button>
    </form>
</body>

</html>