<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('_header.php') ?>
    <link rel="stylesheet" href="CSS/BarScanner.css" data-skin="default">
</head>

<body>
    <!-- .app -->
    <div class="app">
        <!-- Nav Top -->
        <?php include_once('_navTop.php'); ?>

        <!-- Nav Side -->
        <?php include_once('_navSide.php'); ?>

        <!-- .app-main -->
        <main class="app-main">
            <!-- main page -->
            <?php include_once('_inventorySearch.php'); ?>
            <?php include_once('_footer.php'); ?>
        </main><!-- /.app-main -->

    </div><!-- /.app -->
    <?php include_once('_scripts.php'); ?>
    <?php
        if ($b === ''){    
    ?>
    <script src="./JS/adapter-latest.js" type="text/javascript"></script>
    <script src="./JS/quagga.min.js" type="text/javascript"></script>
    <script src="./JS/live_w_locator.js" type="text/javascript"></script>
    <?php
        }  
    ?>
</body>

</html>