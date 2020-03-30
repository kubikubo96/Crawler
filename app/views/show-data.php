<!doctype html>
<html lang="en">
<?php include_once "app/views/head.php" ?>
<body>
<div class="container">
    <h1 id="title-data">Dữ liệu đã thu thập được</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
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
                            <div class="content-title">
                                <?= $row['title'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="content-article">
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
        </table>
    </div>
    <a href="index.php?controller=index" class="text-info"> &larr;Return</a>
</div>
</body>
</html>