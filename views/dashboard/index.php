<?php include_once("includes/header.php"); ?>
<h1 class="page-header">Users</h1>


<form action="<?php echo URL ?>dashboard/addUser" method="post" class="form-signin form-adduser" role="form">
	<input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
    <input type="password" class="form-control" id="psswrd" placeholder="Password" name="password" required />
    <input type="password" class="form-control" id="conpsswrd" placeholder="Repeat Password" name="conpassword" required />
    <input type="hidden" name="role" value="default"/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
</form>    
	
<table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          	 
             <?php
			 	$i = 1;
				foreach($this->userList as $key => $value) {
					echo '<tr>';
					echo '<td>'.$i.'</td>';
					echo '<td>'.$value['username'].'</td>';
					echo '<td>'.$value['role'].'</td>';
					echo '<td>
						<a href="'.URL.'dashboard/edit/'.$value['id'].'"><button class="btn btn-sm btn-primary">Edit</button></a> 
						<a href="'.URL.'dashboard/deleteUser/'.$value['id'].'"><button class="btn btn-sm btn-primary">Delete</button></a>
						</td>';
					echo '</tr>';
					$i++;
				}
			?>         
          </tbody>
        </table>     
<?php include_once("includes/footer.php"); ?> 