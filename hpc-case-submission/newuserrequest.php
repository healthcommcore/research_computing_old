    <?php
$strMessage = nl2br($_POST["txtDescription"]);  
    $strTo = $_POST["to"];  
    $subject = $_POST["issuebrief"];
    $cluster = $_POST["cluster"];  
    $subject2 = $cluster . "_" . $subject;
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $location = $_POST["location"];
    $requester = $_POST["fname"] . " " .  $_POST["lname"];
    $phone = $_POST["phone"];
    $phsname = $_POST["phsname"];
    $eid = $_POST["eid"];
    $group1 = $_POST["group1"];
    $group2 = $_POST["group2"];
    $impact = $_POST["impact"];
    $cc = $_POST["cc"];
    $sponser = $_POST["sponser"];
    $grantnum = $_POST["grantnum"];
    $grantenddate = $_POST["grantenddate"];
    $grantpeople = $_POST["grantpeople"];
    $strMessage .= "@category=Compute Cluster \n";
    $strMessage .= "@PHS User ID=" . $phsname . "\n";
    $strMessage .= "@DFCI ID Number=" . $eid . "\n";
    $strMessage .= "@First Name=" . $fname .  "\n";
    $strMessage .= "@Last Name=" . $lname .  "\n";
    $strMessage .= "@Location=" . $location .  "\n";
    $strMessage .= "@Email=" . $email .  "\n";  
    $strMessage .= "@Phone=" . $phone . "\n"; 
    $strMessage .= "@Requester=" . $requester . "\n";
    $strMessage .= "@Impact=" . $impact . "\n";
    $strMessage .= "@CC List=" . $cc . "\n";
    $strMessage .= "@Membership=" . $group2 . $group1 . "\n";
    $strMessage .= "Sponser: " . $sponser . "\n";
    $strMessage .= "Grant Number: " . $grantnum . "\n";
    $strMessage .= "Grant End Date: " . $grantenddate . "\n";
    $strMessage .= "Number of People on Grant Need Access to System: " . $grantpeople . "\n Project Scope: ";
    $strMessage .= nl2br($_POST["project"]) . "\n Compute Need: ";
    $strMessage .= nl2br($_POST["compute"]) . "\n Storage Need: ";
    $strMessage .= nl2br($_POST["storage"]); 
    $category = $_POST["category"];  
    //*** Uniqid Session ***//  
    $strSid = md5(uniqid(time()));  
      
    $strHeader = "";  
    $strHeader .= "From: ".$requester ."<".$_POST["email"].">\nReply-To: ".$_POST["email"]."";  
      
    $strHeader .= "MIME-Version: 1.0\n";  
    $strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n";  
    $strHeader .= "This is a multi-part message in MIME format.\n";  
      
    $strHeader .= "--".$strSid."\n";  
    $strHeader .= "Content-type: text/html; charset=utf-8\n";  
    $strHeader .= "Content-Transfer-Encoding: 7bit\n";  
    $strHeader .= $strMessage."\n";  
      
    //*** Attachment ***//  
    if($_FILES["fileattach"]["name"] != "")  
    {  
    $strFilesName = $_FILES["fileattach"]["name"];  
    $strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileattach"]["tmp_name"])));  
    $strHeader .= "--".$strSid."\n";  
    $strHeader .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n";  
    $strHeader .= "Content-Transfer-Encoding: base64\n";  
    $strHeader .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n";  
    $strHeader .= $strContent."\n";  
    }  
      
    $message= $_POST["issue"];
    $message2 = $strContent."\n\n" . $message;  
    if(mail($strTo, $subject2, $message2, $strHeader))
    {  
    echo "Your request is submitted successfully.  Please check your mail for status updates about this case.";  
    }  
    else  
    {  
    echo "Your request cannot be submitted, please contact systems@jimmy.harvard.edu.";  
    }  
    ?>  
    </body>  
    </html>  
