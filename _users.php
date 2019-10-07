<?php
//////////////////////////////////////////////////////
////               Set Defaults
//////////////////////////////////////////////////////
$user = '';


//////////////////////////////////////////////////////
////               Show Saved Form
//////////////////////////////////////////////////////
    if (!isset($_GET['user']) && isset($_POST['userID'] )){
        $user = 'saved';
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
                    <h1>User Updated!</h1>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <p class="card-text">Select the next user to update.</p>
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
if (isset($_GET['user']) && !isset($_POST['userID'] )){
    //////////////////////////////////////////////////////
    ////               Show Update Form
    //////////////////////////////////////////////////////
    $user = $_GET['user'];
    //update this user
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
                    <h1>Update User</h1>
                    <form class="needs-validation" method="POST" action="profiles.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="userName">Name</label>
                                <input type="text" class="form-control" name="userName" id="userName" required=""
                                    placeholder="UserName">
                                <div class="invalid-feedback"> Please Enter User Name</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="userEmail">Email</label>
                                <input type="text" class="form-control" name="userEmail" id="userEmail" required=""
                                    placeholder="Email">
                                <div class="invalid-feedback"> Please Enter User Email</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="userPassword">Password</label> <input type="password" class="form-control"
                                    placeholder="Password" id="userPassword" name="userPassword" value="" required="">
                                <div class="invalid-feedback"> Please Enter User Password </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="userEmail">Access Level</label>
                                <select class="form-control" id="userACL" name="userACL" value="" required="">
                                    <option value="">Please Select Access Level</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">LIBRARIAN</option>
                                    <option value="3">CLERK</option>
                                    <option value="4">GUEST</option>
                                </select>
                                <div class="invalid-feedback"> Please Select Access Level </div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Update User Profile</button>
                    </form><!-- /form .needs-validation -->
                </section>


            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->

<?php
}
if ($user === ''){
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
                    <h1>Update Users!</h1>
                    <!-- start Card -->
                    <div class="card bg-secondary">
                        <div class="card-body text-center">
                            <h4 class="card-title"> Select User</h4>
                            <p class="card-text">
                                <form method="GET">
                                    <!-- .form-row -->
                                    <div class="form-row">
                                        <!-- grid column -->
                                        <div class="col-md-12 mb-3">
                                            <label for="userName">Name on card</label>
                                            <select class="form-control" name="user" id="userName" required="">
                                                <option value=""> Please Select user </option>
                                                <option value="user1"> Jan KannieLeesie </option>
                                            </select>
                                            <div class="invalid-feedback"> Please Select user </div>
                                        </div><!-- /grid column -->
                                    </div><!-- /form row column -->
                                    <input type="submit" class="btn btn-primary  btn-lg btn-block" value="Update">
                                </form>
                            </p>
                        </div>
                    </div> <!-- end Card -->
                </section>
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->
<?php
}
?>