
    <div class="container">
        <div class="card mb-4">
          <h5 class="card-header">Selamat Datang <?= strtoupper($this->session->userdata('deskripsi'))?></h5>
          <hr class="my-0" />
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
          <div class="card-body">
            
          </div>
        </div>
    </div>