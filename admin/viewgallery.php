<?php

include('php/query.php');
include('../session.php');
include('checkadmin.php');
include 'include/A-header.php';
// include'admin/include/A-header1.php';

?>


<div class="container">
<div class="dashboard__main ">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-30 fw-500">View gallery</h1>
            </div>
            <div class="col-md-6">
                <a href="addgallery.php" class="button px-20 py-10 -dark-1 bg-blue-1 text-white">Add gallery</a>
            </div>
            <div class="tabs__content pt-30 js-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="overflow-scroll scroll-bar-1">
                        <table class="table-3 -border-bottom col-12">
                            <thead class="bg-light-2">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = $pdo->query('select * from gallery');
                                $allgallery = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($allgallery as $gallery) {

                                    ?>

                                    <th scope="row"><?php echo $gallery['id'] ?></th>
                                    <td><?php echo $gallery['name'] ?></td>
                                    <td><img width="150px" src="img/<?php echo $gallery['image'] ?>" alt=""></td>
                                    <td><a href="editgallery.php?id=<?php echo $gallery['id'] ?>"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <td><a href="?gremove=<?php echo $gallery['id'] ?>" class="btn btn-danger">Remove</a>
                                    </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>

            </div>
        </div>
    </div>
    </div>
    </section>
</body>

</html>

<!-- Blank End -->
<?php
    include("components/footer_db.php");
    ?>