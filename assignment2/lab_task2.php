<html>
<body>
<?php

$errorNameWordCnt=$errEmpty=$mustContain=$start=$errEmpty2="";
$emailEmpty=$emailValidation=$errorBG="";
$dateErr="";
$errGender="";
$errDegree="";
$reg="/^[a-zA-Z\s\.-]+$/";
$DateBegin = date('Y-m-d', strtotime("01/01/1953"));
$DateEnd = date('Y-m-d', strtotime("01/01/1998"));
$degreErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_REQUEST['name'];
    $email=$_REQUEST['email'];
    $date=$_REQUEST['date'];
    if (empty($name)) 
    { 
      $errEmpty="Must fill the name .";
    } 
    if(str_word_count($name)<2)
    {
        $errorNameWordCnt="Must have two Words .";
    }
    else if(preg_match($reg,$name)==false)
    {
        $mustContain="Can contain a-z, A-Z, period, dash only .";
    }

    else if(!($name[0]>='a' && $name[0]<='z') && !($name[0]>='A' && $name[0]<='Z'))
    {
        $start="Must start with letter .";

    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $emailValidation="Email format is not correct.";
    }
    if (empty($email)) 
    { 
      $errEmpty2="MUst fill the email .";
    } 
    if(empty($date)){
        $dateErr="Date can't be empty";
    }
    elseif($date<$DateBegin || $date>$DateEnd){
        $date="Invalid Date";
    }
    if(!isset($_POST['gender'])){
        $errGender="Must select";
    }
    $cnt=0;
    if(isset($_POST['ssc']))
    {
        $cnt++;
    }
    if(isset($_POST['hsc']))
    {
        $cnt++;
    }
    if(isset($_POST['bsc']))
    {
        $cnt++;
    }
    if(isset($_POST['msc']))
    {
        $cnt++;
    }
    if($cnt<2)
    {

        $errDegree="You have to atleast two degree. ";
    }
    if(!isset($_POST['bg']) || $_POST['bg']==""){
        $errorBG="Must Select A Blood Group";
    }
    

  }
  
 

?>
<form method="post" action="lab_task2.php">
    <fieldset>
       <legend>Name</legend> 
       <input type="text" name="name" id="name">
       <span style="color:red">*<?php echo $errEmpty ?> 
       <?php echo $errorNameWordCnt ?>
       <?php echo  $mustContain?> <?php echo  $start?>

   </fieldset>

   <fieldset>
       <legend>Email</legend> 
       <input type="text" name="email" id="email">
       <span style="color:red">*<?php echo $emailEmpty ?> 
       <?php echo $emailValidation ?>
      
   </fieldset>
   <fieldset>
       <legend>Date</legend> 
       <input type="date" name="date" id="date">
       <span style="color:red">*<?php echo $dateErr ?> 
      
   </fieldset>

   <fieldset>
       <legend>Gender</legend> 
       <input name="gender" id="male" type="radio" value="male">
        <label for="male">Male</label>
        <input name="gender" id="female" type="radio" value="female">
        <label for="female">Female</label>
        <input name="gender" id="other" type="radio" value="other">
        <label for="other">Other</label> 
        <span style="color:red">*<?php echo $errGender ?>
   </fieldset>

   <fieldset>
       <legend>Degree</legend> 
       <input type="checkbox" name="ssc" id="ssc" value="SSC">
       <label for="ssc">SSC</label><br><br>
       <input type="checkbox" name="hsc" id="hsc" value="HSC">
       <label for="hsc">HSC</label><br><br>
       <input type="checkbox" name="bsc" id="bsc" value="BSC">
       <label for="bsc">BSC</label><br><br>
       <input type="checkbox" name="msc" id="msc" value="MSC">
       <label for="msc">MSC</label><br><br>
       <span style="color:red">*<?php echo $errDegree ?>

   </fieldset>
   <fieldset>
       <legend>Blood Group</legend> 
       <select id="bg" name ="bg">
            <option value=""></option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB-">AB-</option>
            <option value="B-">B-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
        </select>
        <span style="color:red">*<?php echo $errorBG ?>

   </fieldset>

   <input type="submit">

</form>
</body>

</html>




