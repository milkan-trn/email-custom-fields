  
//This is just for testing
function sendEmailTest(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Cancel the default action, if needed
      event.preventDefault();
      alert('Hello World!');
    }
  }
  //It shows message when xmlhttp.readyState < 4
  function showLoading() {
    var target = document.querySelector('.nlMessage');
          target.innerHTML = 'Sending...';
        }
  //Returns true or false if mail is entered
  function validateEmail(email) 
      {
          let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
      } 
  //Sends email when  newslette_input() function is triggered
  function sendNewsletterMail() {
    if (event.keyCode === 13) {
      let getEmail = document.getElementById("email_field").value;
      let messageField = document.querySelector('.nlMessage');
    const xmlhttp = new XMLHttpRequest();
    const dbParam = JSON.stringify({"email": getEmail});
    //console.log(dbParam);
    if(validateEmail(getEmail)){
      showLoading();
    xmlhttp.open("GET", "http://localhost/givat.mediaotg.dev/wp-content/plugins/email-custom-fields/inc/newsletter_form.php?x=" + dbParam);
  xmlhttp.onreadystatechange =  function() {
    if(xmlhttp.readyState < 4) {
              showLoading();
            }
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              outputLocation(xmlhttp.responseText);
            }
          };
          xmlhttp.send();
        } else { messageField.innerHTML = "Please enter email!"}
        }
      
  }
  //This will show message in class="nlMessage" div tag
  function outputLocation(data) {
          var target = document.querySelector('.nlMessage');
          var inputEmail = document.getElementById("email_field");
          var json = JSON.parse(data);
          var responseStatus = json.email;
          console.log(json);
          target.innerHTML = responseStatus;
          inputEmail.value = "";
        }
   
  
   // Newsletter Function    
  function newslette_input(){
    var input = document.getElementById("email_field");
    var iconInp = document.querySelector('.fi-icon.fas.fa-chevron-right');
  
  // Execute a function when the user releases a key on the keyboard
  input.addEventListener("keyup", sendNewsletterMail);
  iconInp.addEventListener("click", function(event) {
    // Number 13 is the "Enter" key on the keyboard
      return;
  });
  }
  newslette_input ();
  