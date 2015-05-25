<?php
  include "../_connection/db.php"; 
?>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" id="username">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="password">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" id="email">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>ชื่อ</label>
    <input type="text" class="form-control" id="fname">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>นามสกุล</label>
    <input type="text" class="form-control" id="lname">
</div>
</div>
</div>
<div class="row">
    
</div>
<div class="row">
    <div class="col-lg-12">
    <div class="form-group">
        <label>สถานะ</label>
        <select class="form-control">
            <option value="0">- เลือกสถานะ -</option>
            <option value="1">Super Admin</option>
            <option value="2">Admin Area</option>
            <option value="3">Admin Site</option>
            <option value="4">User Site</option>
        </select>
    </div>
    </div>
</div>
<?php ?>