<html>
<body>
<?php

$errorNameWordCnt=$errEmpty=$mustContain=$start=$errEmpty2="";
$errPasswordLetter=$errPasswordCon="";
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
    $password=$_REQUEST['password'];
    $len=strlen($password);
    
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
    if($len<=7)
    {

        $errPasswordLetter="Password must contain 8 letters.";
    }
    $cnt=0;
    for($i=0;$i<$len;$i++)
    {
        if($password[$i]=="@" || $password[$i]=="$" ||$password[$i]=="#" || $password[$i]=="%")
        {
            $cnt=1;
        }
    }
    if($cnt==0)
    {

        $errPasswordCon="Must contain atlest one of them @/#/$/%.";
    }

    
    

  }
  
 

?>
<form method="post" action="assignment3.php">
    <fieldset>
       <legend>Log In</legend> 
       <lable>User Name</lable>
       <input type="text" name="name" id="name">
       <span style="color:red">*<?php echo $errEmpty ?> 
       <?php echo $errorNameWordCnt ?>
       <?php echo  $mustContain?> <?php echo  $start?></span>
       <br><br>
       <lable>Password</lable>
       <input type="password" name="password" id="password">
       <span style="color:red">*<?php echo $errPasswordLetter?>
       <?php echo   $errPasswordCon?> 
       

   </fieldset>

   

   <input type="submit">

</form>
</body>

</html>




