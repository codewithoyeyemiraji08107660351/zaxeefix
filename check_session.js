//checking session before form submission
document
	.getElementById('repairForm')
	.addEventListener('submit', function (event) {
		event.preventDefault();

		fetch('checking_session.php')
			.then((response) => response.json())
			.then((data) => {
				if (!data.loggedIn) {
					alert('Please Login/SignUp before you make request.');
					window.location.href = 'login.php';
				} else {
					this.submit();
				}
			})
			.catch((error) => console.error('Error:', error));
	});
