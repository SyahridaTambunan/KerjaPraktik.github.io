<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="my-2"></div>
                        <!-- add category categories here -->
                        <a href="<?= base_url() ?>categoris/create" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Add Categories</span>
                        </a>
                        <div class="my-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- add category categories here -->


        <!-- Pending Requests Card Example -->

    </div>
</div>
<!-- /.container-fluid -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>CategoryName</th>
                        <th>Category ID</th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($tes as $testes) : ?>
                        <tr>
                            <th><?= $testes['CategoryName']; ?></th>
                            <th><?= $testes['CategoryID']; ?></th>
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