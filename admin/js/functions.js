function confirm_msg(page)
{
var response = window.confirm("Are you sure you want to quit without saving?");
if (response)
  {
    if(page=="user")
			location.replace("users.php");
		else
			if(page=="article")
				location.replace("index.php");
			else
				location.replace("documents.php");
	}
}

function ValidateForm(){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.user_form.email.value;
   if(document.user_form.login.value=="")
   {
     alert('Please enter login name');
	 document.user_form.login.focus();
	 document.user_form.login.select();
      return false;
   }
    if(document.user_form.password.value=="" && document.user_form.add.value=="Add")
   {
     alert('Please enter password');
      return false;
   }
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
      return false;
   }
 }

 function doc_validation()
 {
 if(document.doc_form.title.value=="")
   {
     alert('Please enter document title');
	 document.doc_form.title.focus();
	 document.doc_form.title.select();
      return false;
   } 
   if(document.doc_form.file.value=="" && document.doc_form.add.value=="Add")
   {
     alert('Please enter document file');
	 document.doc_form.file.focus();
	 document.doc_form.file.select();
      return false;
   } 
   if(document.doc_form.fromDate.value=="" || document.doc_form.fromDate.value=="//")
   {
     alert('Please enter document date');
	 document.doc_form.fromDate.focus();
	 document.doc_form.fromDate.select();
      return false;
   } 
   if(document.doc_form.toDate.value=="" || document.doc_form.toDate.value=="//")
   {
     alert('Please enter document date');
	 document.doc_form.toDate.focus();
	 document.doc_form.toDate.select();
      return false;
   } 
    if(CompareDates()==false)
	  return false;
 }
 
function CompareDates()
 {
    var str1 = document.getElementById("fromDate").value;
     var str2 = document.getElementById("toDate").value;
     var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
     var yr1  = parseInt(str1.substring(6,10),10);
     var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
     var yr2  = parseInt(str2.substring(6,10),10);
     var date1 = new Date(yr1, mon1, dt1);
     var date2 = new Date(yr2, mon2, dt2);

     if(date2 < date1)
     {
         alert("To date cannot be greater than from date");
         return false;
     }
 }