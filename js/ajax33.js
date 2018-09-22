function ajaxClickForContactDetails(postid){
  //The div displaying the ContactDetails should always have its PostID as part of the ID to identify it
  var divToUpdate = "divContactDetails"+postid;

  jQuery.ajax({
    type: "POST",    
    url: "http://65.39.128.43/~isupply/wp-content/themes/isupply/js/ajax/clickforcontactdetails.php",                
    data: "postid="+postid,
    success: function(resp) {
//     alert( "this worked" );
      // Fill the contents of the DIV with the response from the clickforcontactdetails.php call
      document.getElementById(divToUpdate).innerHTML = resp;     
      // Refresh the Admin DIV with the latest counts now that we have adjusted one of them
      ajaxShowAdminDetails(postid);
    },
    error: function(msg){
//     alert( "Error");
    }
  });
}


function ajaxShowAdminDetails(postid){
  //The div displaying the ContactDetails should always have its PostID as part of the ID to identify it
  var divToUpdate = "divAdminInfo"+postid;

  jQuery.ajax({
    type: "POST",    
    url: "http://65.39.128.43/~isupply/wp-content/themes/isupply/js/ajax/showadmindetails.php",                
    data: "postid="+postid,
    success: function(resp) {
//     alert( "this one worked" );
      // Fill the contents of the DIV with the response from the showadmindetails.php call
      document.getElementById(divToUpdate).innerHTML = resp;     
    },
    error: function(msg){
//     alert( "Error");
    }
  });
}


function ajaxDoRejection(postid, objectWithEmailText, divToHide){

  //Extract the text from the object name passed in so we can pass it along
  var txtMessage = document.getElementById(objectWithEmailText).value;
//  alert(txtMessage);

  jQuery.ajax({
    type: "POST",    
    url: "http://65.39.128.43/~isupply/wp-content/themes/isupply/js/ajax/rejectpost.php",                
    data: "postid="+postid+"&message="+txtMessage,
    success: function(resp) {
      alert( resp );

    // Now that the reject panel has been used, hide it again      
//      document.getElementById('divRejection').style.display = "none";
      document.getElementById(divToHide).style.display = "none";

      
    },
    error: function(msg){
//     alert( "Error");
    }
  });
}