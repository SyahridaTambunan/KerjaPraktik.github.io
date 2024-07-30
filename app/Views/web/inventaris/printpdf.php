<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inventaris PDF</title>
    <style>
        /* Tambahkan CSS untuk styling PDF di sini */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Daftar Inventaris</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Jumlah</th>
                <th>Tanggal Pembelian</th>
                <th>Harga</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tes as $item) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['ItemName'] ?></td>
                    <td><?= $item['CategoryName'] ?></td>
                    <td><?= $item['LocationName'] ?></td>
                    <td><?= $item['Quantity'] ?></td>
                    <td><?= $item['PurchaseDate'] ?></td>
                    <td>Rp.<?= $item['Price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>