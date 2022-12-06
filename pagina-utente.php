<?php
    if(!isset($_SESSION['userLogged'])){
        
        header('Location: login.php');
    }

    include_once './partial/head.php';

?>


<body>
    
    <?php
        include_once './partial/header.php';
    ?>

    <main>
       <div class="container">
            <h1>Ciao <?php echo $_SESSION['userLogged']['name'] ?></h1>
            <h2>Indirizzzo: <?php echo $_SESSION['userLogged']['indirizzo'] ?></h2>
       </div>
    </main>
    <?php
        include_once './partial/footer.php';
    ?>
<script src="./js/script.js"></script>
</html>