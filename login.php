<?php
    include_once ("header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 bg-light mt-4 form">
            <form class="mt-4">
                <h3 class="text-center ">Form Login</h3>
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Email :</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password :</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn -center btn-primary submit mt-4">Submit</button>
            </form> 
        </div>
        <div class="col-4"></div>
    </div>
</div>
