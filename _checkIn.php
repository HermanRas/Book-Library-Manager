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
                    <h1>Book Checked In!</h1>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="card-text">You are welcome to check in the next book.</p>
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
    ////               Show Checkin Form
    //////////////////////////////////////////////////////
    $b = $_GET['b'];
    //check in this book
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
                    <h1>Check In Book!</h1>
                    <form class="needs-validation" method="POST" action="checkIn.php" novalidate="">
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
                                    value="<?php echo $b; ?>" required="">
                                <div class="invalid-feedback"> bookID </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backDate">Return Date</label> <input type="date" class="form-control"
                                    id="backDate" value="2019-10-01" required="">
                                <div class="invalid-feedback"> Valid date required </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="backTime">Return Time</label> <input type="time" class="form-control"
                                    id="backTime" value="08:00" required="">
                                <div class="invalid-feedback"> Valid date required </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="duration">Total Duration</label> <input type="text" class="form-control"
                                    id="duration" value="7 Days" readonly="" required="">
                                <div class="invalid-feedback"> Security code required </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue Check In</button>
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
                    <h1>Scan Book ISBN BarCode for Check In</h1>

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