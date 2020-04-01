<!doctype html>
<html lang="en">
<?php include_once "app/views/head.php" ?>
<body>
<div class="container">
    <div>
        <h1 id="title-data">Data has been collected</h1>
        <table class="table" id="table-crawler">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">DateTime</th>
                <th scope="col">Title</th>
                <th scope="col">Contents</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td>
                            <div class="content-date-crawler">
                                <?= $row['datetime'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="content-title-crawler">
                                <?= $row['title'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="content-article-crawler">
                                <?= $row['article'] ?>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<br> Không có bản ghi nào trong CSDL";
            }
            ?>
            </tbody>
    </div>
    <a href="index.php?controller=index" class="text-info"> &larr;Return</a>
</div>
</div>
</body>
</html>