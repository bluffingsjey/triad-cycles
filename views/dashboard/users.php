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
	 //<a href="'.URL.'dashboard/deleteUser/'.$value['id'].'"><button class="btn btn-sm btn-danger">Delete</button></a>
        $i = 1;
        foreach($this->userList as $key => $value) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$value['username'].'</td>';
            echo '<td>'.$value['role'].'</td>';
            echo '<td>
                <a href="'.URL.'dashboard/edit/'.$value['id'].'"><button class="btn btn-sm btn-primary">Edit</button></a> 
				<button class="btn btn-sm btn-danger delMe" user-id="'.$value['id'].'" data-toggle="modal" data-target="#deletePopup">Delete</button>
                </td>';
            echo '</tr>';
            $i++;
        }
    ?>         
  </tbody>
</table>     
        
<div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Triad Cycles</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger delPopup" brand-id="">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->        
        
        
<?php include_once("includes/footer.php"); ?> 

<script type="text/javascript">
$(document).ready(function(){
	
	var user_id;
	
	$(".delMe").click(function(){
		
		user_id = $(this).attr("user-id");
		
	});
	
	$(".delPopup").click(function(){
	
		window.location = "<?php echo URL.'dashboard/deleteUser/' ?>" + user_id;
		
	});
	
});
</script>