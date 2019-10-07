<?php
$qr = '';
if(isset($_GET['qr'])){
    $qr = $_GET['qr'];
}
?>
<!-- .wrapper -->
<div class="wrapper">
    <!-- .page -->
    <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-section -->
            <div class="page-section">

                <!-- .section-block -->
                <section id="container" class="container">
                    <h1>Print Or Share User QR Code</h1>
                    <div class="card">
                        <form action="main.php">
                            <div class="card-body">
                                <h2>QR for User ID: <span class="text-inline" id="QrID"><?php echo $qr; ?></span>
                                </h2>
                                <section id="qr-code">
                                </section>
                                <input class="btn btn-success" type="button" value="Print" onclick="PrintElem()">
                                <input class="btn btn-primary" type="submit" value="HOME">
                            </div>
                        </form>
                    </div>
                </section>
                <script>
                function PrintElem() {
                    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                    mywindow.document.write('<html><head><title>' + document.title + '</title>');
                    mywindow.document.write('</head><body >');
                    var canvas = document.getElementById('YourQRCode');
                    var img = canvas.toDataURL("image/png");
                    mywindow.document.write('<img src="' + img + '"/>');
                    mywindow.document.write('</body></html>');

                    var now = new Date().getTime();
                    while (new Date().getTime() < now + 2000) {
                        /* do nothing */
                    }

                    mywindow.focus(); // necessary for IE >= 10*/
                    mywindow.print();
                    return true;
                }
                </script>

                <script type="module">
                    import QrCode from './JS/qr-code.min.js';

                    function readSettings() {
                        let settings = {};
                            settings.radius = '0' ;
                            settings.ecLevel = 'H' ;
                            settings.fill = '#000000' ;
                            settings.background = null ;
                            settings.size = 250 ;
                            settings.text = document.getElementById('QrID');
                        return settings;
                    }

                    function renderQrCode() {
                        let time = new Date(),
                            container = document.querySelector('#qr-code'),
                            settings = readSettings();
                        container.innerHTML = '';
                        QrCode.render(settings, container);
                    }

                    for (let input of document.querySelectorAll('input, select')) {
                        input.addEventListener('change', renderQrCode);
                    }
                    renderQrCode();
                </script>
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->