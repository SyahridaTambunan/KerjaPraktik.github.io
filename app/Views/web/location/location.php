<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LOKASI</h1>
        </div>

        <div class="row"></div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="my-2"></div>
                        <!-- add category location here -->
                        <a href="<?= base_url() ?>/location/create" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Tambah Lokasi</span>
                        </a>
                        <div class="my-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- add category location here -->


        <!-- Pending Requests Card Example -->

    </div>
</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LOKASI</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Lokasi</th>
                        <th>Deskripsi Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tes as $testes) : ?>
                        <tr>
                            <th><?= $testes['LocationName']; ?></th>
                            <th><?= $testes['LocationDescription']; ?></th>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="<?= site_url('location/edit/' . $testes['LocationID']); ?>" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="<?= site_url('location/delete'); ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="LocationID" value="<?= $testes['LocationID']; ?>">
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