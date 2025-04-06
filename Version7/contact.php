<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HappyFeet: Contact Us</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

<?php require 'layout/navbar.php'; ?>
<br>
<br>
<div class="container">
    <div class="cnt">
        <div class="col-md-120">  <!-- Centering form -->
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Fill in the form below to send us a message.</p>
            <hr>

            <form action="process_contact.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>
    </div>
</div>
<br><hr>
<?php require 'layout/footer.php'; ?>

</body>
</html>
