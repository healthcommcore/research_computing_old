function validate() {
if((document.rform.fname.value.length==0)){
alert ('Please fill in the First Name Field.')
return false;
}
if((document.rform.lname.value.length==0)){
alert ('Please fill in the Last Name Field.')
return false;
}
if((document.rform.phsname.value.length==0)){
alert ('Please fill in the PHS Account Name Field.')
return false;
}
if((document.rform.eid.value.length==0)){
alert ('Please fill in the DFCI Employee ID Field.')
return false;
}
if((document.rform.email.value.length==0)){
alert ('Please fill in the Business Email Field.')
return false;
}
var email = document.rform.email.value;
var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email)) {
alert('Please provide a valid email address');
return false;
}

if((document.rform.phone.value.length==0)){
alert ('Please fill in the Phone Field.')
return false;
}
if((document.rform.issuebrief.value.length==0)){
alert ('Please fill in the Brief Description Field.')
return false;
}
if((document.rform.cluster.value.length==0)){
alert ('Please fill in the System Name Field.')
return false;
}
if((document.rform.issue.value.length==0)){
alert ('Please fill in the Issue Description Field.')
return false;
}

return true;
}

