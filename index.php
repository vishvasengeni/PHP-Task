<html>
<body>
<h2>Contact Form</h2>
<form id="second_form" name="second_form" method="post" action="query.php">
	<table>
		<tr>
			<td>First name</td><td><input type="text" name="firstname" id="firstname" value=""></td>
</tr>
<tr>
			<td>Last name</td><td><input type="text" name="lastname" id="lastname" value=""></td>
</tr>

<tr>
			<td>Email</td><td><input type="text" name="u_email" id="u_email" value=""></td>
</tr>
<tr>
			<td>Mobile</td><td><input type="number" name="mobile" id="mobile" value=""></td>
</tr>
<tr>
	<td>Country</td>
	<td><select name="country" id="country">
<option value="">Select Country</option>
    <option value="india">India</option>
    <option value="canada">Canada</option>
    <option value="australia">Australia</option>
    <option value="germany">Germany</option>
	<option value="france">France</option>
  </select></td>
</tr>
<tr>
	<td>Website</td><td><input type="text" name="website" id="website" value=""></td></tr>
	<tr>
		<td></td><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>

$(document).ready(function() {
	$('#second_form').validate({
  rules: {
    firstname: 'required',
    lastname: 'required',
	country: 'required',
	mobile: 'required',
    u_email: {
      required: true,
      email: true,
    },
    website: {
      required: true,
      minlength: 8,
    }
  },
  messages: {
    firstname: '<span style="color:red">Enter first name</span>',
    lastname: '<span style="color:red">Enter last name</span>',
    u_email: '<span style="color:red">Enter a valid email</span>',
    website: {
		required: '<span style="color:red">Enter website</span>',
      minlength: '<span style="color:red">website must be at least 8 characters long</span>'
    },
	country: '<span style="color:red">Select country</span>',
	mobile: '<span style="color:red">Enter mobile number</span>'
  },
  submitHandler: function(form) {
    form.submit();
  }
});
});
</script>
</body>
</html>



