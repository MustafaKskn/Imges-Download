<!DOCTYPE html>
<html>
<head>
    <title>Resim İndirme Sitesi</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <form action="download.php" method="post">
        <h2>Resim İndirme Sitesi</h2>
        <input type="text" id="input1" name="url" required placeholder="RESİM URL GİRİN">

        <button type="submit" class="button">İndir</button>		
        
        <?php if(isset($_GET['error'])) { ?>
            <script>
                var error = "<?php echo $_GET['error']; ?>";
                alert(error);
            </script>
        <?php } ?>
    </form>
    
</body>
</html>




