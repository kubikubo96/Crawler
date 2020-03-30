<!doctype html>
<html lang="en">
<?php include_once "app/views/head.php" ?>
<body>
<div class="container">
    <form action="" method="post">
        <h1 id="title-crawler">Crawlers</h1>
        <div class="form-group">
            <label for="inputUrl">Enter the address you want to crawl data</label>
            <input type="text" class="form-control" id="inputUrl" name="url" placeholder="Enter url">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="index.php?controller=show-data" class="text-info">Display the data you have collected</a>
</div>
</body>
</html>