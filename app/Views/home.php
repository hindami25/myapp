<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
</head>

<body>
    <div class="container">
        <h2>Home</h2>
        <p>Deskripsi tentang sesuatu...</p>
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= esc($student['nama']); ?></td>
                    <td><?= esc($student['nilai']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="/description">Deskripsi lebih lanjut</a>
        <br><br>
        <a href="/logout">Logout</a>
    </div>
</body>

</html>