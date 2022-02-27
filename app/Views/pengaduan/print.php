</html <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>

    <style>
        .container {
            margin: 20px;
        }

        .gambar {
            width: 35%;
            float: left;
        }

        .isi {
            width: 65%;
            float: left;
        }

        h2 {
            margin: 4px;
        }

        h4 {
            font-weight: 100;
            margin: 4px;
        }

        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            max-width: 100%;
            height: auto;
        }
    </style>

</head>

<body>
    <div class="container">
        <?php foreach ($pengaduan as $row => $value) : ?>
            <h2><?= $value->judul ?></h2>
            <h4><i>Oleh : <strong><?= $value->nama ?></strong></i></h4>
            <small style="margin-top: 100px;"><i><?= $value->tgl_pengaduan ?></i></small>
            <hr>
            <div class="pengaduan">
                <div class="gambar">
                    <img src="<?= $_SERVER["DOCUMENT_ROOT"] . '/images/' . $value->foto ?>">
                </div>
                <div class="isi">
                    <p style="margin: 0 10px 5px 10px;"><?= $value->isi ?></p>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</body>

</html