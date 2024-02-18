<!DOCTYPE html>
<html>

<body>
    <h1>Email Contact Form</h1>
    <form action="form-validation.php" method="post">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="subject" placeholder="subject">
        <textarea rows="5" cols="40" name="message" placeholder=" message"></textarea>
        <input type="submit" value="Submit">
    </form>
</body>

</html>

<style>
    input {
        display: block;
        margin-top: 10px;
    }

    textarea {
        margin-top: 10px;
    }
</style>