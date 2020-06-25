<!DOCTYPE>
<html lang="en">
<head>
	<title>Login Form</title>
</head>
<body>
	<?php
		$userNames[]="puppy123";
		$userNames[]="karenwest";
		$userNames[]="princess500";
		$userNames[]="fluffy23@hotmail.com";
		$userNames[]="riverviewdentist@yahoo.com";
		/////////////////////////////
		$passwords[]="doggy456";
		$passwords[]="victoria546!";
		$passwords[]="queen23";
		$passwords[]="pancakes734";
		$passwords[]="teethrcool!";
		///////////////
		$userName="";
		$password="";
		$count=0;
		$displayForm=TRUE;
		$correctUser=False;
		$correctPassword=False;
		$userNumber=null;
		$passwordNumber=null;
		if(isset($_POST['submit']))
		{
			$userName=$_POST['userName'];
			$password=$_POST['password'];
			$count=$_POST['count'];
			for($i=0; $i<count($userNames);$i++)
			{
				if($userNames[$i]==$userName)
				{
					$correctUser=TRUE;
					$userNumber=$i;
					break;
				}
				
			}
			for($i=0; $i<count($passwords);$i++)
			{
				if($passwords[$i]===$password)
				{
					$passwordNumber=$i;
					if($userNumber==$passwordNumber)
						$correctPassword=TRUE;
					break;
				}
			}
			if(($correctPassword) && ($correctUser))//both are correct
			{
				header('location:successful.html');
			}
			else if(!$correctUser)
			{	
				++$count;
				$displayForm=TRUE;
				if($count>3)
					$displayForm=FALSE;
				else
					echo "Your user name is incorrect. Please try again!";
			}
			else if(!$correctPassword)
			{	
				++$count;
				$displayForm=TRUE;
				if($count>3)
					$displayForm=FALSE;
				else
					echo "Your password is incorrect. Please try again!";
			}
		}
		if($displayForm)//if TRUE
		{
	?>
			<form name="loginForm" action="login.php" method="post">
				<p>User Name: <input type="text" name="userName" value="<?php echo $userName?>"/></p>
				<p>Password:<input type="text" name="password"/></p>
				<input type="submit" name="submit" value="Login"/>
				<input type="hidden" name="count" value="<?php echo $count?>"/>
	<?php 
		}
		else if($count>3)
		{
			header('location:accessDenied.html');
		}
	?>
</body>
</html>