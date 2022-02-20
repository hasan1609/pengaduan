<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <style>
        .container {
            margin: 10px;
            text-align: center;
        }

        .pengaduan {
            border: 2px solid #a5a0a0;
            border-radius: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 10px 20px 10px 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
        }

        .grid-item {
            padding: 10px;
            font-size: 20px;
            text-align: justify;
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
            <hr style="border: 1px solid; width: 500px;">
            <table>
                <tr>
                    <th><?= $value->isi ?></th>
                    <th> <img src="<?= base_url() ?>/images/<?= $value->foto ?>" style="height: 200px; width:100px">
                    </th>
                </tr>
            </table>
        <?php endforeach ?>
    </div>
</body>

</html