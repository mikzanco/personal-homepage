<?php
    // var_dump($_POST);
    // session_start();
    if(isset($_SESSION['userLogged'])){
        
        header('Location: pagina-utente.php');
    }

    if(empty($_POST['mail']) || empty($_POST['password']) ){
        $errormessage = 'Inserire username e password';
    }else{
        $string = file_get_contents('./db/users.json');
        $users = json_decode($string, true);

        $validUser = false;

        foreach($users as $user){
            if ($_POST['mail'] == $user['mail'] && $_POST['password'] == $user['password']){
                $validUser = true;
                $logUser = $user;
            }
        }
        if($validUser){
            
            $_SESSION['userLogged'] = $logUser;
            header('Location: pagina-utente.php');
        }else{
            $errormessage = 'Username o password errati';
        };
    };



    
    include_once './partial/head.php';
    
?>


<body>
    
    <?php
        include_once './partial/header.php';
    ?>

    <main>
        <div class="container">
            <h1>Login</h1>

            <h3><?php echo $errormessage ?></h3>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
    <?php
        include_once './partial/footer.php';
    ?>
<script src="./js/script.js"></script>
</html>