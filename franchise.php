<!DOCTYPE html>
<html>

<head>
    <title>Franchise</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1 class="page-title">Be Part of Our <span>FAMILY</span></h1>

        <div style="background:white; padding:40px; border-radius:15px; max-width:600px; margin:0 auto;">
            <p>Ready to start the journey? Fill out the form below.</p>
            <form>
                <input type="text" placeholder="Full Name" style="width:100%; padding:10px; margin-bottom:10px;"><br>
                <input type="email" placeholder="Email Address"
                    style="width:100%; padding:10px; margin-bottom:10px;"><br>
                <input type="text" placeholder="Proposed Location"
                    style="width:100%; padding:10px; margin-bottom:10px;"><br>
                <button class="btn" type="button" onclick="alert('Application Sent!')">Submit Application</button>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>