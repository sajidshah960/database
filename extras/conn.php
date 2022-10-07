<?php
  mysql_connect("localhost:mysql://3306",
                "your-username", "your-password")
    or die("<p>Error connecting to database: " .
           mysql_error() . "</p>");

  echo "<p>Connected to MySQL!</p>";
?>