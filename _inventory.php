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
                    <h1>Update Book!</h1>
                    <form class="needs-validation" method="POST" action="checkOut.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="bookAuthor">Author</label>
                                <input type="text" class="form-control" name="bookAuthor" id="bookAuthor"
                                    placeholder="Please Enter Author" required="">
                                <div class="invalid-feedback"> Please Enter Book Author </div>
                            </div><!-- /grid column -->
                            <!-- /grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="bookTitle">Book Title</label>
                                <input type="text" class="form-control" name="bookTitle" id="bookTitle"
                                    placeholder="Please Entre Book Title" required="">
                                <div class="invalid-feedback"> Please Enter Book Title </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookPublished">Book Year Published</label>
                                <input type="number" class="form-control" id="bookPublished" name="bookPublished"
                                    placeholder="Please enter year of Publication" value="" required="">
                                <div class="invalid-feedback"> Please enter book year of Publication </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookVersion">Book Version/Edition </label>
                                <input type="number" class="form-control" id="bookVersion" name="bookVersion"
                                    placeholder="Please enter book Version/Edition" value="">
                                <div class="invalid-feedback"> Please enter book Version/Edition </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookISBN">Book ISBN</label>
                                <input type="text" class="form-control" id="bookISBN" name="bookISBN"
                                    placeholder="Please enter ISBN" value="" required="">
                                <div class="invalid-feedback"> Please enter book ISBN </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookPic">Book Picture URI</label>
                                <input type="text" class="form-control" id="bookPic" name="bookPic"
                                    placeholder="Please enter Book Picture URI" value="IMG/NOIMG.png">
                                <div class="invalid-feedback"> Please enter Book Picture URI </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Update Book !</button>
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
                    <h1>Scan Book ISBN BarCode for Update</h1>

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