<?php 
require 'function.php';

if(!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu!!');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$id_data = $_GET['id_data'];

$data_barang = query("SELECT * FROM data_barang
INNER JOIN lokasi ON data_barang.lokasi = lokasi.id_lokasi
INNER JOIN barang ON data_barang.nama_Barang = barang.id_barang
INNER JOIN size ON data_barang.size = size.id_size WHERE id_data = '$id_data' 
")[0]; 

$data_gudang = query("SELECT * FROM data_barang");
$lokasi = query("SELECT * FROM lokasi");
$size = query("SELECT * FROM size");
$barang = query("SELECT * FROM barang");

if (isset ($_POST ["edit"])) {
    if (edit($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Edit');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Data Gagal Disimpan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<?php include '../../layouts/sidebar.php' ?>

<h2>Edit Data</h2>

<form action="" method="post">
    <input type="hidden" name="id_data" value="<?= $data_barang['id_data']; ?>">

    <label for="" class="col-form-label">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" value="<?= $data_barang["tanggal"]; ?>" required>

    <label for="" class="col-form-label">Lokasi</label>
        <select name="lokasi" id="lokasi" class="form-control" required>
            <option value="<?= $data_barang["id_lokasi"]; ?>"> <?= $data_barang["Kota"]; ?> </option>
            <?php foreach($lokasi as $data) : ?>
                <option value="<?= $data['id_lokasi']; ?>"><?= $data['Kota']; ?></option>
            <?php endforeach; ?>
        </select>

    <label for="" class="col-form-label">Nama Barang</label>
        <select name="nama_Barang" id="nama_Barang" class="form-control" required>
            <option value=" <?= $data_barang["id_barang"]; ?> "> <?= $data_barang["nama_barang"]; ?> </option>
            <?php foreach($barang as $data) : ?>
                <option value="<?= $data['id_barang']; ?>"><?= $data['nama_barang']; ?></option>
            <?php endforeach; ?>
        </select>

    <label for="" class="col-form-label">Satuan</label>
        <select name="satuan" id="satuan" class="form-control" required>
            <option value="<?= $data_barang["satuan"]; ?>"> <?= $data_barang["satuan"]; ?> </option>
            <option value="DUS">DUS</option>
            <option value="PCS">PCS</option>
        </select>

    <label for="" class="col-form-label">Size</label>
        <select name="size" id="size" class="form-control" required>
            <option value="<?= $data_barang["id_size"]; ?>"> <?= $data_barang["size"]; ?> </option>
            <?php foreach($size as $data ) : ?>
                <option value=" <?= $data['id_size']; ?>"><?= $data['size']; ?></option>
            <?php endforeach; ?>
        </select>

    <label for="" class="col-form-label">Jumlah</label>
    <input type="text" class="form-control" name="jumlah" value="<?= $data_barang["jumlah"]; ?>" required> <br>

    <input type="submit" name="edit" value="submit" class="btn btn-success">
</form>

<?php include '../../layouts/footer.php' ?>
