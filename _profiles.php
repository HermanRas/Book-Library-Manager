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

        //set defaults
        $name = '';
        $surname = '';
        $memberID = '';
        $email = '';
        $contact = '';
        $picture = '';

        //update defaults with real values
        $name = $_POST['memberName'];
        $surname = $_POST['memberSurname'];
        $memberID = $_POST['memberID'];
        $memberSTID = $_POST['memberSTID'];
        $email = $_POST['memberEmail'];
        $contact = $_POST['memberContact'];
        $memberMax = $_POST['memberMax'];

        //insert new
        include_once('db_conf.php');
        $sql = " UPDATE members SET 
                'NAME'='$name',
                'SURNAME'='$surname',
                'EMAIL'='$email',
                'CELL'='$contact',
                'STID'='$memberSTID',
                'BOOK_COUNT'='$memberMax'
                WHERE ID = $memberID;";
        $conn->query($sql);


        echo "<script>
        alert('Member Updated!');
        window.location.replace('qr.php?qr=".$memberID."');
        </script>";
    }
//update if scanned
if (isset($_GET['member']) && !isset($_POST['memberID'] )){
    //////////////////////////////////////////////////////
    ////               Show Update Form
    //////////////////////////////////////////////////////
    $member = $_GET['member'];
    //update this member
    include_once('db_conf.php');
    $sql = "SELECT * FROM members
            WHERE ID = $member ;";

    $result = $conn->query($sql);

    foreach ($result as $row) {
       break;
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
                <section>
                    <h1>Update Members</h1>
                    <form class="needs-validation" method="POST" action="profiles.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberName">Name</label>
                                <input type="hidden" name="memberID" value="<?php echo $row['ID']; ?>">
                                <input type="text" class="form-control" name="memberName" id="memberName" required=""
                                    placeholder="Member Name" value="<?php echo $row['NAME']; ?>">
                                <div class=" invalid-feedback"> Please Enter Member Name</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberSurname">Surname</label>
                                <input type="text" class="form-control" name="memberSurname" id="memberSurname"
                                    required="" placeholder="Member Surname" value="<?php echo $row['SURNAME']; ?>">
                                <div class=" invalid-feedback"> Please Enter Member Surname</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberSTID">Member Number</label>
                                <input type="text" class="form-control" id="memberSTID" name="memberSTID"
                                    placeholder="SA ID / Student Number" value="<?php echo $row['STID']; ?>"
                                    required="">
                                <div class="invalid-feedback"> Please Enter SA ID / Student Number </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberEmail">Email</label> <input type="email" class="form-control"
                                    placeholder="Members Email Address" id="memberEmail" name="memberEmail"
                                    value="<?php echo $row['EMAIL']; ?>" required="">
                                <div class=" invalid-feedback"> Please Enter Member Email </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberContact">Contact Number</label> <input type="text"
                                    class="form-control" placeholder="Members Contact Number" id="memberContact"
                                    name="memberContact" value="<?php echo $row['CELL']; ?>" required=""
                                    minlength=" 10">
                                <div class="invalid-feedback"> Please Enter Member Contact Number 0720001234</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberMax">Max Number Book</label> <input type="number" class="form-control"
                                    placeholder="Members Contact Number" id="memberMax" name="memberMax"
                                    value="<?php echo $row['BOOK_COUNT']; ?>" required="">
                                <div class=" invalid-feedback"> Please Enter Member Number Book 1-10</div>
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
                    <h1>Update Member Info</h1>
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

                                                <?php
                                                include_once('db_conf.php');
                                                $sql = "SELECT * FROM members
                                                        ORDER BY ID asc ;";
                                                $result = $conn->query($sql);

                                                foreach ($result as $row) {
                                                    echo '<option value="'.$row['ID'].'"> '.$row['NAME'].' '.$row['SURNAME'].' </option>';
                                                }
                                                ?>

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