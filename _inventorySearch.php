<?php 
$q = '%';

if (isset($_GET['q'])){
    $q = "%". $_GET['q']."%";
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
                    <form class="form-inline">
                        <h1>All Books</h1>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" placeholder="Title or Author" name="q">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>

                    <?php
                    include_once('db_conf.php');
                    $sql = "SELECT * FROM BOOKS 
                            WHERE TITLE LIKE '$q' 
                            OR AUTHER LIKE '$q'
                            ORDER BY TITLE DESC;";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                    ?>

                    <!-- Show Last Scanned BarCode -->
                    <div class="card">
                        <form action="inventory.php">
                            <div class="card-body">
                                <div class="float-left"> <img src="<?php echo $row['PICTURE'];?>"
                                        style="width:75px;height:100px; padding:5px;" alt="No Img"></div>
                                <div class="float-left">
                                    <h2><?php echo $row['TITLE'];?></h2>
                                    <footer class="blockquote-footer">(<?php echo $row['YEAR'];?>) - <cite
                                            title="Source Title"><?php echo $row['AUTHER'];?></cite></footer>
                                </div>
                            </div>
                            <br>
                            <div class="float-right">
                                <input type="hidden" name="b" value="<?php echo $row['ID'];?>">
                                <input class="btn btn-sm btn-primary" type="submit" value="Update Book">
                            </div>
                        </form>
                    </div>

                    <?php 
}
?>

                </section>
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->