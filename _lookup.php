<!-- .wrapper -->
<div class="wrapper">
    <!-- .page -->
    <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-section -->
            <div class="page-section">

                <!-- .section-block -->
                <div class="section-block">
                    <!--  start column -->
                    <div class="card-columns" id="booklist">


                    </div> <!--  close column -->
                </div> <!-- /.section-block -->

                <?php if(!isset($_POST['title'])){?>
                <script src="JS/booksAPI.js"></script>
                <?php }else{ 
                    
                    //set defaults
                    $title = '';
                    $author = '';
                    $edition = '';
                    $year = '';
                    $isbn = '';
                    $picture = '';

                    //update defaults with real values
                    $title = $_POST['title'];
                    $author = $_POST['author_name'];
                    $edition = $_POST['edition'];
                    $year = $_POST['publish_date'];
                    $isbn = $_POST['isbn'];
                    $picture = $_POST['cover'];

                    

                    //insert new
                    include_once('db_conf.php');
                    $sql = " INSERT INTO books ('TITLE','AUTHER','EDITION','YEAR','ISBN','PICTURE') VALUES ('$title','$author','$edition','$year','$isbn','$picture');";
                    $conn->query($sql);


                    echo '<div class="card-body">';
                    echo '    <h5 class="card-title">Book "'.$title.'" ADDED</h5>';
                    echo '    <p class="card-text">You can now check this book out.</p>';
                    echo '    <a href="main.php" class="btn btn-primary">Home</a>';
                    echo '    <a href="inventory.php" class="btn btn-secondary">Add More Books</a>';
                    echo '</div>';
                    } ?>
                <!-- http://openlibrary.org/api/books?bibkeys=ISBN:0789730138&jscmd=data&format=json -->
                <!-- http://openlibrary.org/search.json?author=tolkien -->
                <!-- http://openlibrary.org/search.json?title=kingdom+marriage -->

            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->