<?php 
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
</head>

<style>

    body {
        background: #262835;
        color: white;
        overflow: hidden;
        font-family: "Parkinsans", sans-serif;
    }

    .box-shadow {
        background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.7) 100%);
        position: fixed;
        z-index: -1;
        width: 100vw;
        height: 100vh;
        left: 0;
        top: 0;
    }

    .container{
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    fieldset{
        width: 50%;
        display: flex;
        justify-content: center;
        border-radius: 8px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 35%;
        padding: 30px;
    }

    form > input {
        padding: 10px;
        margin: 10px 0px 10px 0px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
    }

    input:focus {
        outline: 0;
    }

    form > button {
        padding: 10px;
        border: none;
        background: #477be1;
        color: white;
        transition: background 0.3s ease;
        border-radius: 5px;
        cursor: pointer;
    }

    form > button:hover{
        background: #75b2fe;

    }
</style>


<body>
    <div class="box-shadow"></div>


    <div class="container">
        <fieldset>
            <legend>Register</legend>
            <form method="post" action="/register/createAcc">

                <label for="Username">Username:</label>
                <input type="text" id="Username" name="Username" required autocomplete="off">

                <label for="Password">Password:</label>
                <input type="Password" id="Password" name="Password" required>

                <button type="submit">Register</button>
                </br>
            </form>
        </fieldset>
    </div>
</body>
