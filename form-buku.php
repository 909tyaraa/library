<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-danger">
                <h4 class="text-white">
                    Form Buku
                </h4>
            </div>

             <div class="card-body">
                 <form action="process-buku.php" method="post"
                 enctype="multipart/form-data">
                    ISBN
                    <input type="number" name="isbn"
                    class="form-control mb-2" required>

                    Judul Buku
                    <input type="text" name="judul_buku"
                    class="form-control mb-2" required>

                    Penulis
                    <input type="text" name="penulis"
                    class="form-control mb-2" require>

                    Penerbit
                    <input type="text" name="penerbit"
                    class="form-control mb-2" required>

                    Jumlah Halaman
                    <input type="number" name="jumlah_halaman"
                    class="form-control mb-2" required>

                    Genre
                    <select name="genre" class="form-control mb-2"
                    required>
                        <option value="Novel">Novel</option>
                        <option value="Sains">Sains</option>
                        <option value="Religi">Religi</option>
                        <option value="Fanfiction">Fanfiction</option>
                        <option value="Horror">Horror</option>
                        <option value="Fantasi">Fantasi</option>
                    </select>

                    Cover
                    <input type="file" name="cover"
                    class="form-contol mb-2" required>

                    <button type="submit"
                    class="btn btn-info btn-block" name="simpan_buku">
                    Simpan
                    </button>
                 </form>
             </div>
         </div>
    </div>
</body>
</html>