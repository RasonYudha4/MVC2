<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button> 
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Mahasiswa" aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama'];?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'];?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('Yakin Menghapus Data?');">hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'];?>" class="badge text-bg-secondary float-end ms-1">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        <div class="mb-3">
            <label for="Name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <select class="form-select" aria-label="Jurusan" name="jurusan">
            <option selected>Jurusan</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <option value="Teknik Industri">Teknik Industri</option>
            <option value="Kedokteran">Kedokteran</option>
            <option value="Communication">Communication</option>
        </select>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>