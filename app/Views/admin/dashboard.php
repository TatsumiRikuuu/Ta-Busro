<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="position-relative">
    <div class="position-absolute w-100 bg-dark d-block" style="height: 20vh;z-index: -99;">
    </div>
    <div class="px-4">
        <div class="pt-5">
            <h5 class="text-white fw-bold pb-5">Dashboard</h5>
            <div class="card mt-2 border-0 shadow rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold">Tentang Toko</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus congue pellentesque odio ut laoreet. Suspendisse venenatis nisl eros, non viverra elit lobortis sed. Cras facilisis augue eros, ac mollis mi molestie eget. Phasellus nec est et sem faucibus tincidunt. Aliquam rhoncus, mi non convallis pretium, sem eros dictum turpis, eu ullamcorper orci tortor non tortor. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
