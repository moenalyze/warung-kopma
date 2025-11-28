<?php
namespace Midtrans;

if (!isset($_POST['stat'])) {
    header("location:../../../menu.php");
}

require_once dirname(__FILE__) . '/../../Midtrans.php';
Config::$serverKey = 'SB-Mid-server-W3ZnWqEpv56shofbd_Zsqt_G';
Config::$clientKey = 'SB-Mid-client-O1vRQFf5MksXYIrn';

printExampleWarningMessage();

Config::$isSanitized = Config::$is3ds = true;

include "../../../../koneksi.php";
$order_id = $_POST['id'];

$query = mysqli_query($konek, "select p.subtotal, p.id_pesanan, m.id, m.nama, m.harga, p.kuantitas, u.username from menu m join pesanan p join user u on m.id = p.id_menu and u.id_user = p.id_user where p.id_user = '$order_id'");

$total_bayar = 0;
$nama = "";
while ($data = mysqli_fetch_array($query)) {
    $subtotal = $data['kuantitas'] * $data['harga'];
    $total_bayar += $subtotal;
    $nama = $data['username'];
}

$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $total_bayar, 
);

$item_details = array(
    array(
        'id' => 'a1',
        'price' => $total_bayar,
        'quantity' => 1,
        'name' => "Apple"
    ),
);
$customer_details = array(
    'first_name' => $nama
);
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}

function printExampleWarningMessage()
{
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="container">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Makanan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga Makanan</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($konek, "select p.subtotal, p.id_pesanan, m.id, m.nama, m.harga, p.kuantitas, u.username from menu m join pesanan p join user u on m.id = p.id_menu and u.id_user = p.id_user where p.id_user = '$order_id'");
                            $i = 1;
                            while($data = mysqli_fetch_array($result)){
                                $subtotal = $data['kuantitas'] * $data['harga'];
                                echo "<tr>"; 
                                echo "<td>" . $i . "</td>";
                                echo "<td>". $data['nama'] . "</td>"; 
                                echo "<td>". $data['kuantitas'] . "</td>"; 
                                echo "<td>". $data['harga'] . "</td>"; 
                                echo "<td>". $subtotal . "</td>"; 
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="table" style="width:350px;position:absolute;bottom:10%;">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $total_bayar?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pay">
                    <button id="pay-button">Bayar</button>
                    <form action="../../../pindah_data.php?id=<?php echo $order_id?>" method="POST">
                        <button class="lanjut-button" name="lanjut">Lanjutkan</button>
                    </form>
                </div>
                <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                    data-client-key="<?php echo Config::$clientKey; ?>"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function () {
                        snap.pay('<?php echo $snap_token ?>');
                    };
                </script>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</body>

</html>