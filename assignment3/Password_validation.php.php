<html>
<body>
<?php

$errCurrnt="";
$errMatch="";
$errMatchpass="";
$errReMatchpass="";
$errPasswordCon=$errPasswordLetter="";
$Cure="abc@1234";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $password1= $_REQUEST['currentPassword'];
    $password2= $_REQUEST['newPassword'];
    $password3= $_REQUEST['rePassword'];
    $cnt=0;
    $len=strlen($password2);
    if(strcmp($password1,$Cure)!=0)
    {
        $errCurrnt="Password don't match.";
    }
    if(strcmp($password2,$Cure)==0)
    {
        $errCurrnt="You can not set same password.";
    }
    if(strcmp($password2,$password3)!=0)
    {
        $errReMatchpass="Retype and new password don't match.";
    }
    if($len<=7)
    {

        $errPasswordLetter="Password must contain 8 letters.";
    }
    
    for($i=0;$i<$len;$i++)
    {
        if($password2[$i]=="@" || $password2[$i]=="$" ||$password2[$i]=="#" || $password2[$i]=="%")
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
<form method="post" action="assignment3b.php">
    <fieldset>
       <legend>Change Password</legend> 
       
       <lable>Current Password</lable>
       <input type="password" name="currentPassword" id="currentPassword">
       <span style="color:red">*<?php echo $errMatch?> <?php echo $errCurrnt?> <?php echo   $errPasswordCon?></span>
       <br><br>
       <lable>New Password</lable>
       <input type="password" name="newPassword" id="newPassword">
       <span style="color:red">*<?php echo $errMatchpass?><?php echo  $errPasswordLetter?><?php echo   $errPasswordCon?></span>
       <br><br>
       <lable>Retype Password</lable>
       <input type="password" name="rePassword" id="rePassword">
       <span style="color:red">*<?php echo $errReMatchpass?></span>


      
       

   </fieldset>

   

   <input type="submit">

</form>
</body>

</html>




