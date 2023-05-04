<?php require '../views/partials/_head.view.php'?>
<?php require '../views/partials/_nav.view.php'?>
<div class='mx-auto' style="max-width: 350px;">
    <h4>Create Form</h4>
    <form method="post">
        <div class='mb-4'>
            <input type='text' name='name' class='form-control'>
        </div>
        <div class='mb-4'>
            <input type='text' name='author' class='form-control'>
        </div>
        <div class='mb-4'>
            <input type='text' name='year' class='form-control'>
        </div>
        <button class='btn btn-primary'>Submit</button>
    </form>
</div>
<?php require '../views/partials/_footer.view.php'?> 