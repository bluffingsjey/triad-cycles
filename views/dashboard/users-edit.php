<?php include_once("includes/header.php"); ?>
<h1 class="page-header">Users Edit</h1>

<form action="<?php echo URL ?>dashboard/editSave/<?php echo $this->userSingle['id']; ?>" method="post" class="form-signin form-adduser" role="form">
	<input type="text" class="form-control" placeholder="Username" name="username" required autofocus value="<?php echo $this->userSingle['username']; ?>"/>
    <input type="password" class="form-control" id="psswrd" placeholder="Password" name="password" required />
    <input type="password" class="form-control" id="conpsswrd" placeholder="Repeat Password" name="conpassword" required />
    <select name="role" class="form-control">
        <option value="default" <?php if($this->userSingle['role'] == 'default') echo 'selected' ; ?>>Default</option>
        <option value="admin" <?php if($this->userSingle['role'] == 'admin') echo 'selected' ; ?>>Admin</option>
        <option value="owner" <?php if($this->userSingle['role'] == 'owner') echo 'selected' ; ?>>Owner</option>
    </select>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
</form> 
<?php include_once("includes/footer.php"); ?> 


