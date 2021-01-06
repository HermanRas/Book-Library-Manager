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

        //set defaults
        $title = '';
        $author = '';
        $edition = '';
        $year = '';
        $isbn = '';
        $picture = '';

        //update defaults with real values
        $id = $_POST['bookID'];
        $title = $_POST['bookTitle'];
        $author = $_POST['bookAuthor'];
        $edition = $_POST['bookVersion'];
        $year = $_POST['bookPublished'];
        $isbn = $_POST['bookISBN'];
        $picture = $_POST['bookPic'];

        

        //insert new
        include_once('db_conf.php');
        $sql = " UPDATE books SET
        `TITLE`='$title',
        `AUTHER`='$author',
        `EDITION`='$edition',
        `YEAR`='$year',
        `ISBN`='$isbn',
        `PICTURE`='$picture'
        WHERE `ID` = $id;";
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
                    <h1>Book Updated!</h1>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="card-text">You are welcome to update more books now.</p>
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

    foreach ($result as $row) {
    break;
    }

    if(!isset($row['TITLE'])){
        echo "<script>
        alert('Book Not In Library!');
        window.location.replace('lookup.php?id=$b');
        </script>";
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
                    <h1>Update Book!</h1>
                    <form class="needs-validation" method="POST" action="inventory.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="bookAuthor">Author</label>
                                <input type="hidden" name="bookID" value="<?php echo $row['ID']; ?>">
                                <input type="text" class="form-control" name="bookAuthor" id="bookAuthor"
                                    placeholder="Please Enter Author" required="" value="<?php echo $row['AUTHER']; ?>">
                                <div class="invalid-feedback"> Please Enter Book Author </div>
                            </div><!-- /grid column -->
                            <!-- /grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="bookTitle">Book Title</label>
                                <input type="text" class="form-control" name="bookTitle" id="bookTitle"
                                    placeholder="Please Entre Book Title" required=""
                                    value="<?php echo $row['TITLE']; ?>">
                                <div class="invalid-feedback"> Please Enter Book Title </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookPublished">Book Year Published</label>
                                <input type="text" class="form-control" id="bookPublished" name="bookPublished"
                                    placeholder="Please enter year of Publication" required=""
                                    value="<?php echo $row['YEAR']; ?>">
                                <div class="invalid-feedback"> Please enter book year of Publication </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookVersion">Book Version/Edition </label>
                                <input type="number" class="form-control" id="bookVersion" name="bookVersion"
                                    placeholder="Please enter book Version/Edition"
                                    value="<?php echo $row['EDITION']; ?>">
                                <div class="invalid-feedback"> Please enter book Version/Edition </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="bookPic">Book Picture URI</label>
                                <input type="text" class="form-control" id="bookPic" name="bookPic"
                                    placeholder="Please enter Book Picture URI" value="<?php echo $row['PICTURE']; ?>">
                                <div class="invalid-feedback"> Please enter Book Picture URI </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-12 mb-3">
                                <label for="bookISBN">Book ISBN</label>
                                <input type="text" class="form-control" id="bookISBN" name="bookISBN"
                                    placeholder="Please enter ISBN" required="" value="<?php echo $row['ISBN']; ?>">
                                <div class="invalid-feedback"> Please enter book ISBN </div>
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