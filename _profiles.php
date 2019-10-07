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
//update if scanned
if (isset($_GET['member']) && !isset($_POST['memberID'] )){
    //////////////////////////////////////////////////////
    ////               Show Update Form
    //////////////////////////////////////////////////////
    $member = $_GET['member'];
    //update this member
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
                    <form class="needs-validation" method="POST" action="profiles.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberName">Name</label>
                                <input type="text" class="form-control" name="memberName" id="memberName" required=""
                                    placeholder="Member Name">
                                <div class="invalid-feedback"> Please Enter Member Name</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberSurname">Surname</label>
                                <input type="text" class="form-control" name="memberSurname" id="memberSurname"
                                    required="" placeholder="Member Surname">
                                <div class="invalid-feedback"> Please Enter Member Surname</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberID">Member Number</label>
                                <input type="text" class="form-control" id="memberID" name="memberID"
                                    placeholder="SA ID / Student Number" value="<?php echo $member; ?>" required="">
                                <div class="invalid-feedback"> Please Enter SA ID / Student Number </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberEmail">Email</label> <input type="email" class="form-control"
                                    placeholder="Members Email Address" id="memberEmail" name="memberEmail" value=""
                                    required="">
                                <div class="invalid-feedback"> Please Enter Member Email </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberContact">Contact Number</label> <input type="text"
                                    class="form-control" placeholder="Members Contact Number" id="memberContact"
                                    value="" required="" minlength="10">
                                <div class="invalid-feedback"> Please Enter Member Contact Number 0720001234</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberContact">Max Number Book</label> <input type="number"
                                    class="form-control" placeholder="Members Contact Number" id="memberContact"
                                    value="" required="">
                                <div class="invalid-feedback"> Please Enter Member Number Book 1-10</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Update Member Profiel</button>
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