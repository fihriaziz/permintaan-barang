<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dropdown value from database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <h1>Dropdown value from database</h1>
        <br><br><br>
    </div>

    <form action="dropdownfromdb" method="post">
        <div class="row">
        <div class="col-sm-4">
            <select class="pet-select" name="pet">
            <option>Choose Name</option>
            <option value="ahmad" data-age="21">Ahmad</option>
            <option value="abu" data-age="27">Abu</option>
            <option value="ali" data-age="21">Ali</option>
            </select><br><br>
        </div>
        <div class="col-sm-8">
            <label>His age is: </label><input type="number" id="age-value" name="age" value="">
        </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $(".pet-select").change(function () {
    var nowAge = $(this).children(':selected').data('age');
    console.log(nowAge);

    $("#age-value").val(nowAge);
});
})
</script>

</body>
</html>
