
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
$('.toggler').click(function(){
    var path = $(this).attr('path');
    $('#popupEdit').css('display','block');
    $('.pathinput').val(path);
    $('.path').text(path);
});

</script>


</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<button class="toggler" path="example text">Click Me</button>
<button class="toggler" path="example text 2">Click Me 2</button>
<button class="toggler" path="example text 3">Click Me 2</button>




<div id="popupEdit" class="popupEdit" style="display: none">
    <p class="path"></p>
    <div class="popupEdit-content">
        <form action="transfer.php" method="post">
            <input type="text" name="path" class="pathinput" value="PATHHERE" >
            <input type="text" name="new-name" placeholder="nowa nazwa">
            <input type="submit" value="Submit" class="popupEdit-submit">
        </form>
    </div>
</div>


</body>
</html>
