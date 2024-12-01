<?php
// Apakah ketika submit harus INSERT atau UPDATE?
$submitValue = 'Simpan';

// Data kontak
$id = '';
$nama = '';
$nomorTelepon = '';
$email = '';
$alamat = '';

// Seting database
$host = 'localhost:8889'; // <-- Defaultnya 3306
$user = 'root';
$pass = 'root'; // <-- Defaultnya kosong ''
$dbName = 'buku_kontak';

// Objek untuk menampung koneksi ke DB
$connection = null;

// Coba untuk membuat koneksi ke DB
try
{
    $dsn = "mysql:host={$host};dbname={$dbName}";
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
}
catch (PDOException $e)
{
    echo "Koneksi gagal! Detail: {$e->getMessage()}";
    die(1); // Hentikan program!
}
?>

<?php
// Memeriksa apakah ada aksi
if(isset($_GET['aksi']))
{
    $aksi = $_GET['aksi'];
    $id = $_GET['id']; // <-- ID yg akan dihapus/diedit

    // Apakah hapus?
    if($aksi === 'hapus')
    {
        // Hapus data
        $sql = "DELETE FROM kontak WHERE id = '$id'";
        $connection->exec($sql);
    }
    elseif($aksi === 'ubah')
    {
        // Ubah value button simpan menjadi 'Update';
        $submitValue = 'Update';

        $selectedKontak = []; // <-- Menampung kontak yang mau diedit
        // Tampilkan data yang ID-nya diklik
        $sql = "SELECT * FROM kontak WHERE id = '$id'";
        // Query
        $statement = $connection->prepare($sql);
        $success = $statement->execute();
        if($success)
        {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            $selectedKontak = $data[0];

            echo "<pre>";
            print_r($selectedKontak);
            echo "</pre>";

            $nama = $selectedKontak['nama'];
            $nomorTelepon = $selectedKontak['nomor_telepon'];
            $email = $selectedKontak['email'];
            $alamat = $selectedKontak['alamat'];
        }
    }
}
?>

<html>
<head>
    <title>Buku Kontak Online</title>
</head>
<body>
    <h1>Buku Kontak Online v1.0 (Beta)</h1>
    <h2>Beranda</h2>
    <form method="post" action="index.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <table>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input name="nama" type="text" value="<?php echo $nama; ?>"/></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">No. Telepon:</label></td>
                <td><input name="nomor_telepon" type="tel" value="<?php echo $nomorTelepon; ?>"/></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input name="email" type="email" value="<?php echo $email; ?>"/></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea name="alamat"><?php echo $alamat; ?></textarea></td>
            </tr>
            <tr>
                <td><input name="submit" type="submit" value="<?php echo $submitValue; ?>"></td>
            </tr>
        </table>
    </form>
<?php
// Simpan data jika pengguna mengklik 'Simpan'.

if(isset($_POST['submit']))
{
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nomorTelepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    if($_POST['submit'] === 'Simpan')
    {
        // Buat SQL-nya untuk INSERT ke DB
        $sql = "INSERT INTO 
                kontak (nama, nomor_telepon, email, alamat)
                VALUES ('$nama', '$nomorTelepon', '$email', '$alamat')";
    }
    else
    {
        $sql = "UPDATE kontak SET
                    nama = '$nama',
                    nomor_telepon = '$nomorTelepon',
                    email = '$email',
                    alamat = '$alamat'
                WHERE
                    id = '$id';";
    }

    // Jalankan SQL!
    $connection->exec($sql);
}

// Baca semua data di tabel kontak
$sql = "SELECT * FROM kontak";
$statement = $connection->prepare($sql);
$success = $statement->execute();
$data = []; // Array kosong untuk menampung data yang di-SELECT.
if($success)
{
    $data = $statement->fetchAll(
            PDO::FETCH_ASSOC
    );
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
}
?>
<!-- Ubah bentuk array menjadi tabel -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No. Telepon</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nomor_telepon']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
                <a href="?aksi=hapus&id=<?php echo $row['id']; ?>">Hapus</a>
                <a href="?aksi=ubah&id=<?php echo $row['id']; ?>">Ubah</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<style type="text/css">
table, td, tr{
    border: 1px solid black;
    border-collapse: collapse;
    padding: 8px;
}
</style>
</body>
</html>
