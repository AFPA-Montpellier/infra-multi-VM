<!DOCTYPE html>
<html>
<head>
    <title>TP Vagrant Web + DB</title>
</head>
<body>
    <h1>Database Connection Test</h1>
    <?php
    $host = '192.168.56.11';
    $user = 'tp_user';
    $password = 'tp_password';
    $database = 'tp_db';
    
    try {
        $conn = new mysqli($host, $user, $password, $database);
        
        if ($conn->connect_error) {
            echo "<p style='color: red;'>Connection error: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>✅ Database connection successful!</p>";
            echo "<p>MySQL Server: " . $conn->server_info . "</p>";
            echo "<p>Host: " . $host . "</p>";
            
            $result = $conn->query("SELECT VERSION() as version");
            if ($result) {
                $row = $result->fetch_assoc();
                echo "<p>MySQL Version: " . $row['version'] . "</p>";
            }
            
            $conn->close();
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>Exception: " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>
