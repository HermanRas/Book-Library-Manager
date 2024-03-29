<?php
//////////////////////////////////////////////////////
////               Set Defaults
//////////////////////////////////////////////////////
$b = '';


//////////////////////////////////////////////////////
////               Show Saved Form
//////////////////////////////////////////////////////
    if (!isset($_GET['b']) && isset($_POST['bookID'] )){
        $b = 'saved';

    $bookID = '';
    $MemberID = '';
    $BookQualityOut = '';
    $BookOut= '';
    $OutUser= '';

    $bookID = $_POST['bookID'];
    $MemberID = $_POST['memberName'];
    $BookQualityOut = $_POST['bookCondition'];
    $BookOut= $_POST['outDate'].' '.$_POST['outTime'];
    $OutUser= '1';

    //insert new
    include_once('db_conf.php');
    $sql = " INSERT INTO book_logs ('BOOK_ID','MEMBER_ID','CHECKED_OUT','OUT_USER','OUT_QUALITY') VALUES ('$bookID','$MemberID','$BookOut','$OutUser','$BookQualityOut');";
    $conn->query($sql);

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
                    <h1>Book Checked Out!</h1>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="card-text">You are welcome to check out a new book.</p>
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
if (isset($_GET['b']) && !isset($_POST['bookID'] )){
    //////////////////////////////////////////////////////
    ////               Show Checkout Form
    //////////////////////////////////////////////////////
    $b = $_GET['b'];
    //check out this book.

    include_once('db_conf.php');
    $sql = "SELECT * FROM BOOKS 
            WHERE ID = '$b' 
            OR ISBN LIKE '%$b%'
            ORDER BY TITLE DESC;";
    $result = $conn->query($sql);

    foreach ($result as $bookrow) {
    break;
    }

    if(!isset($bookrow['TITLE'])){
        echo "<script>
        alert('Book Not In Library!');
        window.location.replace('inventorySearch.php');
        </script>";
    }
?>
<!-- 
////////////////////////////////////////////////////////////////////////
//// MODEL SETUP
////////////////////////////////////////////////////////////////////////
 -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Scan Member QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php include_once("_qr.php"); ?>
                </div>
            </div>

        </div>
    </div>
</div>


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
                    <h1>Check Out Book!</h1>
                    <form class="needs-validation" method="POST" action="checkOut.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberName">Name on card</label> <button type="button"
                                    class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    QR
                                </button>
                                <select class="form-control" name="memberName" id="memberName" required="">
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
                                    value="<?php echo $bookrow['ID']; ?>" required="">
                                <div class="invalid-feedback"> bookID </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backDate">Checkout
                                    Date</label><input type="date" class="form-control" id="outDate" name="outDate"
                                    value="<?php $date = new DateTime('now', new DateTimezone('Africa/Johannesburg')); echo $date->format('Y-m-d'); ?>"
                                    required="">
                                <div class="invalid-feedback"> Valid date required </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backTime">Checkout Time</label> <input type="time" class="form-control"
                                    id="outTime" name="outTime" value="<?php echo $date->format('H:i'); ?>" required="">
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
if ($b === ''){
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
                <section id="container" class="container">
                    <h1>Scan Book ISBN BarCode for Check Out</h1>

                    <!-- Show users camera -->
                    <div id="interactive" class="viewport"></div>
                    <div class="controls">
                        <button class="stop">Stop scanner</button>
                    </div>

                    <!-- Show Last Scanned BarCode -->
                    <h3>Results:</h3>
                    <div id="result_strip">
                        <ul class="thumbnails"></ul>
                        <ul class="collector"></ul>
                    </div>
                </section>


            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->
<?php
}
?>