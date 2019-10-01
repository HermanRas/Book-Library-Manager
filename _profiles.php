<?php
//////////////////////////////////////////////////////
////               Set Defaults
//////////////////////////////////////////////////////
$member = '';


//////////////////////////////////////////////////////
////               Show Saved Form
//////////////////////////////////////////////////////
    if (!isset($_GET['member']) && isset($_POST['memberID'] )){
        $member = 'saved';
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
                <section>
                    <h1>Member Updated!</h1>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="card-text">Select the next member to update.</p>
                            <hr class="mb-4">
                        </div>
                    </div>
                    <a href="main.php" class="btn btn-primary  btn-lg btn-block">Home</a>
                </section>


            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->


<?php
    }
//check if scanned
if (isset($_GET['member']) && !isset($_POST['memberID'] )){
    //////////////////////////////////////////////////////
    ////               Show Checkout Form
    //////////////////////////////////////////////////////
    $member = $_GET['member'];
    //check out this book
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
                <section>
                    <h1>Update Members!</h1>
                    <form class="needs-validation" method="POST" action="checkOut.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberName">Name on card</label>
                                <select class="form-control" name="memberName" id="memberName" required="">
                                    <option value=""> Please Select Member </option>
                                    <option value="member1"> Jan KannieLeesie </option>
                                </select>
                                <div class="invalid-feedback"> Please Select Member </div>
                            </div><!-- /grid column -->
                            <!-- /grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="bookCondition">Book Condition</label>
                                <select class="form-control" name="bookCondition" id="bookCondition" required="">
                                    <option value="">Please Select Book Condition</option>
                                    <option value="gd">GOOD</option>
                                    <option value="fp">Folded Pages</option>
                                    <option value="tp">Teared Pages</option>
                                    <option value="wd">Water Damage</option>
                                    <option value="od">Other Damage</option>
                                </select>
                                <div class="invalid-feedback">Please Select Book Condition</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookID">Book Id</label>
                                <input type="text" class="form-control" id="bookID" name="bookID" placeholder="BookId"
                                    value="<?php echo $member; ?>" required="">
                                <div class="invalid-feedback"> bookID </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backDate">Checkout Date</label> <input type="date" class="form-control"
                                    id="backDate" value="2019-10-01" required="">
                                <div class="invalid-feedback"> Valid date required </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backTime">Checkout Time</label> <input type="time" class="form-control"
                                    id="backTime" value="08:00" required="">
                                <div class="invalid-feedback"> Valid date required </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue Check Out</button>
                    </form><!-- /form .needs-validation -->
                </section>


            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->

<?php
}
if ($member === ''){
    //////////////////////////////////////////////////////
    ////               Show Scanner Form
    //////////////////////////////////////////////////////
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
                <section>
                    <h1>Update Member Info!</h1>
                    <!-- start Card -->
                    <div class="card bg-secondary">
                        <div class="card-body text-center">
                            <h4 class="card-title"> Update Using QR Code</h4>
                            <video style="max-width:300px;" id="qr-video"></video>
                            <p class="card-text">
                                <span id="cam-qr-result">Please scan QR Code</span>
                            </p>
                        </div>
                    </div> <!-- end Card -->

                    <hr>

                    <!-- start Card -->
                    <div class="card bg-secondary">
                        <div class="card-body text-center">
                            <h4 class="card-title"> Manual Search</h4>
                            <p class="card-text">
                                <form method="GET">
                                    <!-- .form-row -->
                                    <div class="form-row">
                                        <!-- grid column -->
                                        <div class="col-md-12 mb-3">
                                            <label for="memberName">Name on card</label>
                                            <select class="form-control" name="member" id="memberName" required="">
                                                <option value=""> Please Select Member </option>
                                                <option value="member1"> Jan KannieLeesie </option>
                                            </select>
                                            <div class="invalid-feedback"> Please Select Member </div>
                                        </div><!-- /grid column -->
                                    </div><!-- /form row column -->
                                    <input type="submit" class="btn btn-primary  btn-lg btn-block" value="Update">
                                </form>
                            </p>
                        </div>
                    </div> <!-- end Card -->
                </section>

                <script type="module">
                    //import plugins
                    import QrScanner from "./JS/qr-scanner.min.js";
                    QrScanner.WORKER_PATH = './JS/qr-scanner-worker.min.js';

                    //set defaults
                    const video = document.getElementById('qr-video');
                    const camQrResult = document.getElementById('cam-qr-result');

                    //run scan
                    function setResult(label, result) {
                        const updateLink =  '<a class="btn btn-primary" href="?member=' + result + '">Update</a> ';
                        const deleteLink =  '<a class="btn btn-danger" href="?remove=' + result + '">Remove</a> ';
                        const printLink =  '<a class="btn btn-info" href="?remove=' + result + '">Reprint QR Code</a>';
                        label.innerHTML = '<h4>'+ result + '</h4>' + updateLink + deleteLink + printLink;
                        label.style.color = 'orange';
                        clearTimeout(label.highlightTimeout);
                        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
                    }

                    // ####### Web Cam Scanning #######
                    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
                    scanner.start();
                    scanner.setInversionMode('original');
                </script>

            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->
<?php
}
?>