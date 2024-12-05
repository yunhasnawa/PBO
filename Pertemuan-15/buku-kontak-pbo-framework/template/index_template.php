<!-- index_template.php -->
<html>
<head>
    <title>Buku Kontak Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #0078AA;
            text-align: center;
        }

        form {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form table {
            width: 100%;
        }

        form table td {
            padding: 10px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background: #0078AA;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #005f88;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background: #0078AA;
            color: #fff;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background: #f4f4f4;
        }

        table tbody tr:hover {
            background: #eaf6fc;
        }
    </style>
</head>
<body>
<h1>Buku Kontak Online v1.0 (Beta)</h1>
<form method="post" action="index.php">
    <table>
        <tr>
            <td><label for="nama">Nama: </label></td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td><label for="nomor_telepon">No. Telp.: </label></td>
            <td><input type="tel" name="nomor_telepon"></td>
        </tr>
        <tr>
            <td><label for="email">Email: </label></td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td><label for="alamat">Alamat: </label></td>
            <td><textarea name="alamat"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="submit" value="Simpan">
            </td>
        </tr>
    </table>
</form>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No. Telepon</th>
        <th>Email</th>
        <th>Alamat</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($daftarKontak as $kontak) { ?>
        <tr>
            <td><?php echo $kontak['id']; ?></td>
            <td><?php echo $kontak['nama']; ?></td>
            <td><?php echo $kontak['nomor_telepon']; ?></td>
            <td><?php echo $kontak['email']; ?></td>
            <td><?php echo $kontak['alamat']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>