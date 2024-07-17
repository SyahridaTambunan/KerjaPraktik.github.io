<?php $this->extend('layout/main') ?>

<?php $this->section('content') ?>
<div class="container">
    <h2>Add Inventaris</h2>
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('inventaris/inventaris_store') ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Item name</label>
            <input type="text" class="form-control" name="ItemName" id="ItemName" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category ID</label>
            <input type="text" class="form-control" name="CategoryID" id="CategoryID" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Location ID</label>
            <input type="text" class="form-control" name="LocationID" id="LocationID" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Quantity</label>
            <input type="text" class="form-control" name="Quantity" id="Quantity" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Purchase Date</label>
            <input type="text" class="form-control" name="PurchaseDate" id="PurchaseDte" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" class="form-control" name="Price" id="Price" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Add data</button>
    </form>
</div>
<?php $this->endSection() ?>