<h1> Profile Page</h1>

<br><br><br>

<h3> hello {{session('username')}}</h3>
<br><a href="logout">logout</a>
<br>    <br>    <a href="UserCall">see all users</a>

<br> <br> 

<form action="search" method="post">
	<label for="name"> search user name:</label><br>
	<input type="text" name="name" id="name"><button type="submit"> search </button>
</form>

