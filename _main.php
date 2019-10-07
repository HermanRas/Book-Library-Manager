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
                                <!-- metric row -->
                                <div class="metric-row">
                                    <div class="col-12">
                                        <div class="metric-row metric-flush">
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <?php
                                                    include_once('db_conf.php');
                                                    $sql = "SELECT COUNT(ID) as 'MEMBERSNUM' FROM MEMBERS ";
                                                    $result = $conn->query($sql);

                                                    foreach ($result as $row) {
                                                    break;
                                                    }
                                                ?>
                                                <a href="#" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> ACTIVE MEMBERS </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="oi oi-people"></i></sub> <span class="value">
                                                            <?php echo $row['MEMBERSNUM'];?>
                                                        </span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <?php
                                                    include_once('db_conf.php');
                                                    $sql = "SELECT COUNT(ID) as 'BOOKNUM' FROM BOOKS ";
                                                    $result = $conn->query($sql);

                                                    foreach ($result as $row) {
                                                    break;
                                                    }
                                                ?>
                                                <a href="#" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> BOOKS IN INVENTORY </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="fa fa-tasks"></i></sub> <span class="value">
                                                            <?php echo $row['BOOKNUM'];?>
                                                        </span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <?php
                                                    include_once('db_conf.php');
                                                    $sql = "SELECT COUNT(ID) as 'CHECKOUTNUM' FROM BOOK_LOGS
                                                            WHERE IN_USER is NULL ;";
                                                    $result = $conn->query($sql);

                                                    foreach ($result as $row) {
                                                    break;
                                                    }
                                                ?>
                                                <a href="#" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> BOOKS CHECKED OUT </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="oi oi-fork"></i></sub> <span class="value">
                                                            <?php echo $row['CHECKOUTNUM'];?>
                                                        </span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <?php
                                                    include_once('db_conf.php');
                                                    $sql = "SELECT COUNT(ID) AS RETURNNUM
                                                    FROM BOOK_LOGS
                                                    WHERE date(CHECKED_OUT,'+1 months') < date('now');";
                                                    $result = $conn->query($sql);

                                                    foreach ($result as $row) {
                                                    break;
                                                    }
                                                ?>
                                                <a href="#" class="metric metric-bordered align-items-center">
                                                    <div class="metric-badge">
                                                        <span class="badge badge-lg badge-danger"><span
                                                                class="oi oi-media-record pulse mr-1"></span>
                                                            OVER DUE BOOKS</span>
                                                    </div>
                                                    <p class="metric-value h3">
                                                        <sub><i class="oi oi-timer"></i></sub> <span class="value">
                                                            <?php echo $row['RETURNNUM'];?>
                                                        </span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                        </div>
                                    </div><!-- /metric row -->
                                </div><!-- /.section-block -->

                                <!-- .section-block -->
                                <div class="section-block">

                                    <!-- ADD CODE HERE -->

                                </div><!-- /.section-block -->



                            </div><!-- /.page-section -->
                        </div><!-- /.page-inner -->
                    </div><!-- /.page -->
                </div>
                <!-- /.wrapper -->