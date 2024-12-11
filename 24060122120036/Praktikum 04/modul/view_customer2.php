<!-- Nama        : Aniqah Nursabrina
    NIM          : 24060122120036
    Tanggal      : 22/09/2024 
    File         : view_customer2.php
    Deskripsi    : untuk menampilkan data customer dengan AS-->

<?php include('./header.php') ?>
<div class="card mt-5">
    <div class="card-header">Customers Data</div>
    <div class="card-body">
        <a href="add_customer.php" class="btn btn-primary mb-4">+ Add Customer Data</a>
        <br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <?php
            // TODO 1 - Praktikum 1 : Lakukan koneksi dengan database
            require_once('./lib/db_login.php');

            // TODO 2 - Praktikum 1 : Tulis dan eksekusi query ke database
            $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";

            $result = $db->query($query);

            if (!$result) {
                die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
            }

            //TODO 3 - Praktikum 1 : Parsing data yang diterima dari database ke halaman 
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row->Nama . '</td>';
                echo '<td>' . $row->Alamat . '</td>';
                echo '<td>' . $row->Kota . '</td>';
                echo '<td>
                        <a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>
                        <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->ID . '">Delete</a>
                      </td>';
                echo '</tr>';
                $i++;
            }

            echo '</table>';
            echo '<br>';
            echo 'Total Rows = ' . $result->num_rows;

            // TODO 4 - Praktikum 1 : Lakukan dealokasi variabel $result
            $result->free();

            // TODO 5 - Praktikum 1 : Tutup koneksi dengan database
            $db->close();
            ?>
    </div>
</div>
<?php include('./footer.php') ?>