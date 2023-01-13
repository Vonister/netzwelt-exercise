  //------------ LOGOUT BUTTON-------------//
  $("#logoutbttn").click(function () {
    Swal.fire({
      title: 'Confirmation',
      text: "Are you sure you want to sign out?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace("logout.php");
      }
    });
  })
