<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $conn = new PDO("mysql:hostname=localhost;dbname=petcaredb", "root", "");
    if (isset($_POST['s'])) {
        $pass = $_POST['pass'];
        $hashed_password = md5($pass);
        $sql = "SELECT * FROM user WHERE pass_user = :hashed_password";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['hashed_password' => $hashed_password]);
        $results = $stmt->fetchAll();
        echo $stmt->rowCount();
        if ($stmt->rowCount() > 0) {
            foreach ($results as $a) {
                echo $a['id_user'];
                $_SESSION = $a['email_user'];
                echo $_SESSION;
            }
        }
    }
    ?>
    <form method="post">
        <input name="pass">
        <button type="submit" name="s"> nn</button>
    </form>
</body>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"> </script>
<script>
    ClassicEditor.create(document.querySelector('#mota'), {
            language: 'vi'
        })
        .then(editor => {})
        .catch(error => {
            console.error(error)
        });
</script>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
        max-height: 450px;
    }
</style>

</html>