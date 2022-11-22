<html>
    <body>
        <?php
        if(!isset($_POST['name']) and !isset($_POST['email']) and !isset($_POST['phone'])) {
            ?> <form action="send.php" method="post"class="form" id="form">
         <input class="input text" type="text" name="name" placeholder="Name" required>
         <input class="input email" type="email" name="email" placeholder="Email "required>
         <input class="input phone" type="phone" name="phone" placeholder="Phone" required>
         <textarea class="input textarea" name="textarea" id="textarea" placeholder="Message" cols="30" rows="10"></textarea>
         <input class="btn" type="submit" value="Send">
         </form> <?php
        } else {
        
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $textarea = $_POST['textarea'];

            $name = htmlspecialchars($name);
            $email = htmlspecialchars($email);
            $phone = htmlspecialchars($phone);
            $textarea = htmlspecialchars($textarea);

            $name = urldecode($name);
            $email = urldecode($email);
            $phone = urldecode($phone);
            $textarea = urldecode($textarea);

            $name = trim($name);
            $email = trim($email);
            $phone = trim($phone);
            $textarea = trim($textarea);

            if(mail("info@dynomax.ee",
                "New message",
                "Name: ".$name."\n".
                "E-mail: ".$email."\n".
                "Phone: ".$phone."\n".
                "Message: ".$textarea,
                "From: Techmax Technology \r\n")
                )   {
                echo "successful sending";
            } else {
                echo "send failed";
            }
        }
        ?>
    </body>
</html>