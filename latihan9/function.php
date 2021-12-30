<?php

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// tampilkan data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    // siapkan wadah
    $rows = [];
    while ($baris = mysqli_fetch_assoc($result)) {
        $rows[] = $baris;
    }

    return $rows;
}




// tambah data
function tambah($data)
{
    // ambil data dari tiap elemen dalam form
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa
                        VALUES
                        ('', '$nama', '$nis', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
