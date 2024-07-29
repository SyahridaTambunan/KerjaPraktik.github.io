<?php

use App\Controllers\Inventaris;

$this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inventory</h1>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="my-2"></div>
                            <!-- add inventory here -->
                            <a href="<?= base_url() ?>inventaris/add" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Add Inventory</span>
                            </a>
                            <div class="my-2"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Inventory</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pembelian</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($tes as $testes) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $testes['ItemName']; ?></td>
                                <td><?= $testes['CategoryName']; ?></td>
                                <td><?= $testes['LocationName']; ?></td>
                                <td><?= $testes['Quantity']; ?></td>
                                <td><?= $testes['PurchaseDate']; ?></td>
                                <td><?= $testes['Price']; ?></td>
                                <td>
                                    <a href="<?= site_url('inventaris/edit/' . $testes['ItemID']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?= site_url('inventaris/delete'); ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="ItemID" value="<?= $testes['ItemID']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php $this->section('script') ?>
<script type="text/javascript">
    function editItem(id) {
        window.location.href = "<?= site_url('item/edit/'); ?>" + id;
    }

    function deleteItem(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            window.location.href = "<?= site_url('item/delete/'); ?>" + id;
        }
    }
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "ajax": {
                "url": "<?= base_url('Inventaris/fetchdata') ?>",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "ItemID"
                },
                {
                    "data": "ItemName"
                },
                {
                    "data": "CategoryID"
                },
                {
                    "data": "LocationID"
                },
                {
                    "data": "Quantity"
                },
                {
                    "data": "PurchaseDate"
                },
                {
                    "data": "Price"
                }
            ]
        });
    });
</script>
<?php $this->endSection('script') ?>
<!-- /.container-fluid -->
<?php $this->endSection() ?>