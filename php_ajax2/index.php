<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/d26b5fdae2.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        nav {
            height: 70px;
        }

        h2 {
            margin: 30px;
        }

        .brand {
            color: #fff;
            font-size: 35px;
            font-weight: 500;
            text-decoration: none;
        }

        .text-center {
            color: white;
        }

        .text-center a {
            text-decoration: none;
        }
    </style>
    <title>CRUD no loading</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="brand" href="https://smktarunabhakti.net">
            Starbhak Soft
        </a>
    </nav>
    <div class="container">
        <h2 align="center">CRUD Ajax No Loading</h2>
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required="true">
                        <p class="text-danger" id="err_nama_siswa"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jurusan</label><br>
                        <select name="jurusan" id="jurusan" class="form-control" required="true">
                            <option value="">Pilih Jurusan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Broadcasting">Broadcasting</option>
                            <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
                        </select>
                        <p class="text-danger" id="err_jurusan"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tanggal Masuk</label><br>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required="true">
                        <p class="text-danger" id="err_tanggal_masuk"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenkel" id="jenkel1" value="Laki-laki" required="true">&nbsp;Laki-laki&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jenkel" id="jenkel2" value="Perempuan">&nbsp;Perempuan
                    </div>
                    <p class="text-danger" id="err_jenkel"></p>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>
            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
        <hr>
        <div class="data mb-5"></div>
    </div>
    <div class="text-center text-primary">&copy;Copyright |
        <a href="https://smktarunabhakti.net/">Starbhak Soft</a>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.data').load("data.php");
        $("#simpan").click(function() {
            var data = $('.form-data').serialize();
            var jenkel1 = document.getElementById("jenkel1").value;
            var jenkel2 = document.getElementById("jenkel2").value;
            var nama_siswa = document.getElementById("nama_siswa").value;
            var tanggal_masuk = document.getElementById("tanggal_masuk").value;
            var alamat = document.getElementById("alamat").value;
            var jurusan = document.getElementById("jurusan").value;

            if (nama_siswa == "") {
                document.getElementById("err_nama_siswa").innerHTML = "Nama Siswa Harus Diisi"
            } else {
                document.getElementById("err_nama_siswa").innerHTML = "";
            }
            if (alamat == "") {
                document.getElementById("err_alamat").innerHTML = "Alamat Siswa Harus Diisi"
            } else {
                document.getElementById("err_alamat").innerHTML = "";
            }
            if (jurusan == "") {
                document.getElementById("err_jurusan").innerHTML = "Jurusan Siswa Harus Diisi"
            } else {
                document.getElementById("err_jurusan").innerHTML = "";
            }
            if (tanggal_masuk == "") {
                document.getElementById("err_tanggal_masuk").innerHTML = "Tanggal Masuk Siswa Harus Diisi"
            } else {
                document.getElementById("err_tanggal_masuk").innerHTML = "";
            }
            if (document.getElementById("jenkel1").checked == false && document.getElementById("jenkel2").checked == false) {
                document.getElementById("err_jenkel").innerHTML = "Jenis Kelamin Harus Dipilih"
            } else {
                document.getElementById("err_jenkel").innerHTML = ""
            }
            if (nama_siswa != "" && tanggal_masuk != "" && alamat != "" && jurusan != "" &&
                (document.getElementById("jenkel1").checked == true || document.getElementById("jenkel2").checked == true)) {
                $.ajax({
                    type: 'POST',
                    url: "form_action.php",
                    data: data,
                    success: function() {
                        $('.data').load("data.php");
                        document.getElementById("id").value = "";
                        document.getElementById("form-data").reset();
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
        });
    });
</script>

</html>