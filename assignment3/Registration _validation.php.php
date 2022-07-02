<html>
<body>
<?php

$errorNameWordCnt=$errEmpty=$mustContain=$start=$errEmpty2="";
$errPasswordLetter=$errPasswordCon="";
$emailEmpty=$emailValidation=$errorBG="";
$dateErr="";
$errGender="";
$errDegree="";
$errUname="";
$errCmp="";
$paisi="";
$error="";
$message="";
$errorfile="";
$errPassLen=$errPasswordCon="";
$reg="/^[a-zA-Z\s\.-]+$/";
$DateBegin = date('Y-m-d', strtotime("01/01/1953"));
$DateEnd = date('Y-m-d', strtotime("01/01/1998"));
$degreErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_REQUEST['name'];
    $email=$_REQUEST['email'];
    $date=$_REQUEST['date'];
    $pass1=$_REQUEST['password1'];
    $pass2=$_REQUEST['password2'];
    $useName=$_REQUEST['userName'];
   
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
    
    if(!isset($_POST['gender'])){
        $errGender="Must select";
    }
    if(strcmp($pass1,$pass2)!=0)
    {
        $errCmp="Password don't match";
    }
    if(strlen($useName)==0)
    {
        $errUname="User name can't be empty";

    }
    if(strlen($pass1<8))
    {

        $errPassLen="Password should have 8 letter";
    }
    $cnt=0;
    for($i=0;$i<strlen($pass1);$i++)
    {
        if($pass1[$i]=='@' || $pass1[$i]=='$' ||$pass1[$i]=='#' || $pass1[$i]=='%')
        {
            $cnt=1;
        }
    }
    if($cnt==0)
    {

        $errPasswordCon="Must contain atlest one of them @/#/$/%.";
    }
    if(empty($errorNameWordCnt) &&  empty($mustContain) && empty($start) && empty($emailEmpty) && empty($emailValidation) && empty($errUname) && empty($errPasswordCon) && empty($errPassLen) && empty($errCmp) && empty($errGender) && empty($dateErr))
    {
        if(file_exists('data.json'))
        {

            $Exist=false;
           
            $data=file_get_contents("data.json");  
            $data=json_decode($data, true);
            foreach((array)$data as $key)
            {
                if( $key['email']== $email)
                {
                   $Exist=true;
                
                }
                if( $key['userName']== $useName)
                {
                   $Exist=true;
                }
                
            }

            
            if($Exist==true)
            {
                $error="This email or username exist.";
            }
            else 
            {
                $newPart = array(  
                    'name'             =>     $_POST['name'],  
                    'email'         =>     $_POST["email"],
                    'password1'      =>     $_POST["password1"],  
                    'userName'    =>     $_POST["userName"],
                    'gender'    =>     $_POST["gender"],  
                    'date'     =>     $_POST["date"]  
                    );
                $data[]=$newPart;
                $newConvert= json_encode($data, true);
                if(file_put_contents('data.json', $newConvert)){  
                    $message = "<label class='text-success'>File Appended Success fully</p>";  
               }    

            }

        } 
        else 
        {
            $errorfile="No file exist";
        }
        
        
    }
   
    

    
    

}
  
 

?>
<form method="post" action="assignment3c.php">

       <lable>Name</lable>
       <input type="text" name="name" id="name">
       <span style="color:red">*<?php echo $errEmpty ?> 
       <?php echo $errorNameWordCnt ?>
       <?php echo  $mustContain?> <?php echo  $start?></span>
       <br><br>

       <lable>Email</lable>
       <input type="email" name="email" id="email">
       <span style="color:red">*<?php echo $emailEmpty ?> 
       <?php echo $emailValidation ?></span>
       <br><br>
       <lable>User Name</lable>
       <input type="text" name="userName" id="userName">
       <span style="color:red">*<?php echo $errUname ?></span></span>
       <br><br>
       <lable>Password</lable>
       <input type="password" name="password1" id="password1">
       <span style="color:red">*<?php echo $errPasswordCon ?> <?php echo $errPassLen ?> </span>
       <br><br>
       <lable>Confirm Password</lable>
       <input type="password" name="password2" id="password2">
       <span style="color:red">*<?php echo $errCmp ?> </span>
       <br><br>


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
   <br><br>
   <fieldset>
       <legend>Date of Birth</legend> 
       <input type="date" name="date" id="date">
       <span style="color:red">*<?php echo $dateErr ?> 
       <?php echo $paisi ?> 
      
   </fieldset>
   <br><br>

   

   <input type="submit">

</form>
<?php
        
        echo $message;
        echo $errorfile ;
 ?>
</body>


</html>




