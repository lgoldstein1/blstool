<html>
<head>
    <title>Input Test</title>
    <script src="AdvHome.js"></script>
</head>
<body>
What foods would you like? <br />
  <form method="post" action="postReceive.php">
    <input type="button" name="testbutton" onclick="SubmitAdd('submitbutton','muffin')"
           value="<?php echo('Muffin')?>">
      <input type="button" name="testbutton" onclick="SubmitAdd('submitbutton','cookie')"
             value="<?php echo('Bagel')?>">
      <input type="button" name="testbutton" onclick="SubmitAdd('submitbutton','bagel')"
             value="<?php echo('Cookie')?>">
    <input type="submit" id="submitbutton" name="submit"
            value="Foods: " >
  </form>

Make a graph
<form method="post" action="chartTest.php">
    <input type="hidden" name="xval"
           value=2>
    <input type="hidden" name="yval"
           value=5>
    <input type="submit" name="submitchart"
           value="go" >
</form>

</body>
<html>
<?php
?>
