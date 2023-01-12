$(document).ready(() => {
    let data;
    //function when click the submit button
    $("#submit-form").on('click',(event) => {
      event.preventDefault();
        
      //initialize the data
      const username = $("#username").val();
      const password = $("#password").val();
        
      //check if the textboxes are null
      if (!username || !password) {
        alert("Please enter a valid username and password");
        return;
      }
      
      //convert to JSON the data
       data = JSON.stringify({username: username, password: password});
      authenticate();
    });

    function authenticate(){
        //ajax call
      $.ajax({
        type: "POST",
        url: 'api/index.php',
        data: data,
        dataType: "json",
        success: (response) => {
          console.log(response)
          if (response.message) {
            alert("Invalid username or password");
          } else {
            alert("Success!");
          }
        },
        error: (xhr, status, error) => {
            if(status=='parseerror'){
                //re-run the function
                authenticate();
            }
          console.error(`Error: ${status}, ${error}`);
          alert("An error occurred, please try again later.");
          
        }
      });
    }
  });
  