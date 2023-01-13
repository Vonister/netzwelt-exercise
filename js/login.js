$(document).ready(() => {
    let data;

    $("#password").keypress(function (event) {
        if (event.keyCode === 13) {
          $("#submit-form").click();
        }
      });

    //function when click the submit button
    $("#submit-form").on('click', (event) => {
        event.preventDefault();

        $("#submit-form").html('<span><span> Logging in... <i class="fa fa-spinner fa-spin fa-1x fa-fw text-light"></i></span></span>');
        $("#submit-form").prop("disabled", true);
        //initialize the data
        const username = $("#username").val();
        const password = $("#password").val();

        //check if the textboxes are null
        if (!username || !password) {
            Swal.fire({
                icon: 'error',
                title: 'LOG IN FAILED',
                text: 'Please enter a valid username and password',
            })
            $("#submit-form").html('<span><span> Login </span></span>');
            $("#submit-form").prop("disabled", false);
            return;
        }

        //convert to JSON the data
        data = JSON.stringify({ username: username, password: password });
        authenticate();
    });

    function authenticate() {
        //ajax call
        $.ajax({
            type: "POST",
            url: '../api/login.php',
            data: data,
            dataType: "json",
            success: (response) => {
                if(response === null){
                    authenticate();
                }else{
                    if (response.message) {
                        Swal.fire({
                            icon: 'error',
                            title: 'LOG IN FAILED',
                            text: 'The username or password you entered is incorrect. Please try again!',
                        })
                    } else {
                        window.location.replace('../index.php')
                    }
                    $("#submit-form").html('<span><span> Login </span></span>');
                    $("#submit-form").prop("disabled", false);
                }
              
                
            },
            error: (xhr, status, error) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong!',
                    html: `<p> <span class="text-danger">Error:</span> ${status}, ${error}.</p></br> We will re-login you. Please wait....`,
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        $("#submit-form").html('<span><span> Logging in... <i class="fa fa-spinner fa-spin fa-1x fa-fw text-light"></i></span></span>');
                        $("#submit-form").prop("disabled", true);
                        authenticate();
                    }
                })


            }
        });
    }
});
