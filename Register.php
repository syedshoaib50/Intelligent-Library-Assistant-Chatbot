<?php
include 'config.php';

$loginSuccessful = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        $loginSuccessful = true;
        echo "Registration Successful. <a href='login.php'>Login Here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .title-bar {
            background-color:rgb(160, 14, 14)
         }
         button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://t4.ftcdn.net/jpg/01/73/87/55/360_F_173875594_YKuT1PxX9LygQtsODgDa0IJ93tszGNNf.jpg');
            background-size: cover;
            background-repeat: no-repeat; 
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .close-btn {
            border: 1px solid black;
            top: 10px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center; 
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            background-color: red;
            padding: 12px;
            float: right;
        }
        .chatbot-container {
            width: 350px;
            margin-top: 0px;
            background-color: rgb(160, 14, 14);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgb(171, 203, 206);
            overflow: hidden;
        }
        .input-container {
            background-image: url('');
            background-size: cover;
            background-repeat: no-repeat; 
            background-position: center;
            display: flex;
            padding: 5px;
            background-color:rgb(163, 238, 235);
        }
        .input-container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .input-container button {
            padding: 10px 15px;
            background-color: rgb(39, 26,151);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php if (!$loginSuccessful): ?>
<div class="chatbot-container">
 <div class="windows-form">
    <div class="title-bar">
    <div class="chatbot-controls">
            <button class="close-btn" onclick="closeWindow()">X</button>
      <h1 align="center" > Sign-Up </h1></div></div>
        <div class="chatbox" id="chatbox"></div>
        <div class="input-container">
    <form method="POST" action="">
             <br><label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br><br>
        <center>
        <button type="submit">Register</button>
        <div class="toggle-links">
        <p>Already have an account? <a href="Login.php">Login here</a></p>
      </div>
    </center>
    </form>
    <?php endif; ?>
    <script>
        function closeChatbot() {
    const chatbot = document.querySelector('.chatbot-container');
    chatbot.style.display = 'none';
    }
    </script>
    <script type="text/javascript">
        function closeWindow() {
            window.location.href = 'index.html'; 
        }
    </script>
</body>
</html>