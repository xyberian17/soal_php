<?php
include('UangTabungan.php');
if (isset($_POST['uang'])){
        $tabungan = new UangTabungan($_POST['uang']);
} else {
    $tabungan = new UangTabungan(1575250);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabungan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card {
            margin: 5% 5%; /* Added */
            float: none; /* Added */
            margin-bottom: 10px; /* Added */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Masukkan Jumlah Uang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post">
                                <div class="input-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="text" class="form-control text-left" id="uang" name="uang" value="<?php if (isset($_POST['uang'])) { echo $_POST['uang']; } else { echo "1575250"; }?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <?php
                                if($tabungan != null) {
                                    ?>
                                    <table class="table table-responsive" style="margin-top: 30px;">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pecahan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Rp. 100,000.00</td>
                                            <td><?php echo $tabungan->getPecahan100000(); ?></td>
                                            <td id="total_pecahan_100000"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Rp. 50,000.00</td>
                                            <td><?php echo $tabungan->getPecahan50000(); ?></td>
                                            <td id="total_pecahan_50000"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Rp. 20,000.00</td>
                                            <td><?php echo $tabungan->getPecahan20000(); ?></td>
                                            <td id="total_pecahan_20000"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Rp. 5,000.00</td>
                                            <td><?php echo $tabungan->getPecahan5000(); ?></td>
                                            <td id="total_pecahan_5000"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Rp. 100.00</td>
                                            <td><?php echo $tabungan->getPecahan100(); ?></td>
                                            <td id="total_pecahan_100"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Rp. 50.00</td>
                                            <td><?php echo $tabungan->getPecahan50(); ?></td>
                                            <td id="total_pecahan_50"></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Subtotal</strong></td>
                                            <td id="jumlah_uang" style="font-weight: bold"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        document.getElementById("total_pecahan_100000").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan100000(); ?>);
        document.getElementById("total_pecahan_50000").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan50000(); ?>);
        document.getElementById("total_pecahan_20000").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan20000(); ?>);
        document.getElementById("total_pecahan_5000").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan5000(); ?>);
        document.getElementById("total_pecahan_100").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan100(); ?>);
        document.getElementById("total_pecahan_50").innerText = "Rp. " + formatMoney(<?php echo $tabungan->getTotalPecahan50(); ?>);
        document.getElementById("jumlah_uang").innerText = "Rp. " + formatMoney(<?php echo $tabungan->jumlah_uang; ?>);
    });
    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    }
</script>
</body>
</html>
