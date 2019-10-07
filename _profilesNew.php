<?php
if(isset($_POST['memberName'])){
                        
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
                    $email = $_POST['memberEmail'];
                    $contact = $_POST['memberContact'];
                    $memberMax = $_POST['memberMax'];

                    //insert new
                    include_once('db_conf.php');
                    $sql = " INSERT INTO members ('NAME','SURNAME','EMAIL','CELL','STID','BOOK_COUNT') VALUES ('$name','$surname','$email','$contact','$memberID','$memberMax');";
                    $conn->query($sql);

                    include_once('db_conf.php');
                    $sql = "SELECT ID FROM members
                            ORDER BY ID DESC ;";
                    $result = $conn->query($sql);

                    foreach ($result as $row) {
                    break;
                    }

                    $UID = '0';
                    if(isset($row['ID'])){
                         $UID = $row['ID'];
                    };

                    echo "<script>
                    alert('Member added!');
                    window.location.replace('qr.php?qr=".$UID."');
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
                    <h1>Add Member</h1>
                    <form class="needs-validation" method="POST" action="profilesNew.php" novalidate="">
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberName">Name</label>
                                <input type="text" class="form-control" name="memberName" id="memberName" required=""
                                    placeholder="Member Name">
                                <div class="invalid-feedback"> Please Enter Member Name</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-6 mb-3">
                                <label for="memberSurname">Surname</label>
                                <input type="text" class="form-control" name="memberSurname" id="memberSurname"
                                    required="" placeholder="Member Surname">
                                <div class="invalid-feedback"> Please Enter Member Surname</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <!-- .form-row -->
                        <div class="form-row">
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberID">Member Number</label>
                                <input type="text" class="form-control" id="memberID" name="memberID"
                                    placeholder="SA ID / Student Number" required="">
                                <div class="invalid-feedback"> Please Enter SA ID / Student Number </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberEmail">Email</label> <input type="email" class="form-control"
                                    placeholder="Members Email Address" id="memberEmail" name="memberEmail" required="">
                                <div class="invalid-feedback"> Please Enter Member Email </div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberContact">Contact Number</label> <input type="text"
                                    class="form-control" placeholder="Members Contact Number" id="memberContact"
                                    name="memberContact" required="" minlength="10">
                                <div class="invalid-feedback"> Please Enter Member Contact Number 0720001234</div>
                            </div><!-- /grid column -->
                            <!-- grid column -->
                            <div class="col-md-3 mb-3">
                                <label for="memberMax">Max Number Book</label> <input type="number" class="form-control"
                                    placeholder="Members Contact Number" id="memberMax" name="memberMax" min="1"
                                    max="10" required="">
                                <div class="invalid-feedback"> Please Enter Member Number Book 1-5</div>
                            </div><!-- /grid column -->
                        </div><!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Member Profiel</button>
                    </form><!-- /form .needs-validation -->
                </section>


            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>
<!-- /.wrapper -->