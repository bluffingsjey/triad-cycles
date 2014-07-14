<!--	Users Edit Page index	-->

<h1>User: Edit</h1>

<form method="post" action="<?php echo URL ?>user/editSave/<?php echo $this->userSingle['id']; ?>">
	<label>Login</label><input type="text" name="login" value="<?php echo $this->userSingle['login']; ?>"/><br/>
    <label>Password</label><input type="text" name="password" value=""><br/>
    <label>Role</label>
    	<select name="role">
        	<option value="default" <?php if($this->userSingle['role'] == 'default') echo 'selected' ; ?>>Default</option>
            <option value="admin" <?php if($this->userSingle['role'] == 'admin') echo 'selected' ; ?>>Admin</option>
            <option value="owner" <?php if($this->userSingle['role'] == 'owner') echo 'selected' ; ?>>Owner</option>
        </select><br/>
    <label>&nbsp;</label><input type="submit"/>
</form>