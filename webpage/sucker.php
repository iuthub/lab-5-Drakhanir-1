
<?php
$name=$_REQUEST["name"];
$section=$_REQUEST["section"];
$card=$_REQUEST["card"];
$company=$_REQUEST["company"];

$validation = empty($name && $company && $card);
if(!$validation) {
    file_put_contents('sucker.txt', "$name, $section, $card, $company; \n", FILE_APPEND);
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php
    if(!$validation)
       { ?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>

    <dl>
        <dt>Name</dt>
         <dd><?= $name?> </dd>

     <dt>Section</dt>
        <dd><?= $section?></dd>
         <dt>Credit Card</dt>
        <dd><?= $card?>(<?= $company ?>)</dd>
    </dl>

<p>Here are all suckers who submitted here:</p>
<ul>
    <?php
        $line=explode(";",file_get_contents("sucker.txt"));
        foreach ($line as $line) { ?>
            <li><div><?= $line ?></div> <li>
       <?php }  ?>
</ul>

<?php } else {?>
<h1>Sorry</h1>
<p>You did not fill any form on a previous page. <a href="buyagrade.php">Try again?</a> </p>

<?php } ?>
</body>
</html>
