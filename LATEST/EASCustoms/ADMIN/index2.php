<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="process/server.php" method="post" class="ajax">
        <input type="hidden" name="command1" value="accept">
        <input type="hidden" name="id1" value="19">
        <button type="submit">Submit</button>

    </form>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script>
$('form.ajax').on('submit', function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
            console.log(response);
        }

    });

    return false;

});
</script>

</body>
</html>