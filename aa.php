<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<script type="text/javascript">

let data = `
2016-02-11
2016-02-12
2016-03-15
2016-03-30
`;
let re = /(\d{4})-(\d{2})-(\d{2})/g;

let newData = data.replace(re, '$3/$2/$1');

console.log(newData);

</script>


<?php
$id = @$_GET["thisid"];
if(isset($_POST['submit']))
{
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $date = $_POST['date'];
    $id = $_POST['id'];
 echo "<h2>ยินดีต้อนรับ คุณ$firstName $lastName $date</h2>";
 echo "id ของท่านคือ $id <br>";
}else{
?>
<form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
ชื่อ<input type="text" name="fName" size=50><br>
นามสกุล<input type="text" name="lName" size=50><br>
วัน<input type="date" name="date" size=50><br>
<input type="hidden" name="id" value = "<?php echo $id ?>"><br>
<input type="submit" name="submit" value="ส่งข้อมูล"></td></tr>
</form>
<?php
}
?>


    <form>
        <h2>Phone Number Validation</h2>
        <label for="phone number">Phone Number (Format: xxx-xxx-xxxx)</label>
        <input type="date" pattern="/(\d{4})-(\d{2})-(\d{2})/g;" required >
 
        <input type="submit" onclick="">

        
    </form>
</body>
</html>