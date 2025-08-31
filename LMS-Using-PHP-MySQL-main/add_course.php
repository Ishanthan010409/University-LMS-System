<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add courses</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    /* Set the background color and font for the whole page */
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    /* Style the headings */
    h2 {
      color: #2196F3;
      text-align: center;
      margin-top: 40px;
      margin-bottom: 20px;
    }
    form {
        width: 40%;
        margin: 0 auto;
    }

    /* Style the form fields */
    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

  </style>
</head>

<body>
  <h2>Add Course</h2>
  <form action="add.php" method="post">
    <label for="semester">Semester:</label>
    <input type="text" id="semester" name="semester" required>
    <label for="cource_name">Course Name:</label>
    <input type="text" id="cource_name" name="cource_name" required>
    <label for="cource_policy">Course Policy:</label>
    <textarea id="cource_policy" name="cource_policy" required></textarea>
    <input type="submit" value="Add Course" name="submit" class="btn btn-primary">
  </form>
</body>

</html>