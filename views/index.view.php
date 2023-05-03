<?php require '../views/partials/_head.view.php'?>
<?php require '../views/partials/_nav.view.php'?>
<div class="container">
    <h4>List of Books</h4>
    <form class='d-flex gap-2'>
        <select name="filter" class='form-control'>
            <option disabled selected>Filter By</option>
            <option value="name">Name</option>
            <option value="author">Author</option>
        </select>
        <input type='text' name='query' class='form-control' placeholder="Enter Query"/>
        <button class='btn btn-sm btn-primary'>Filter</button>
    </form>
    <a class='btn btn-sm btn-dark' href='/books/create'>Create New Book</a>
    <ul class='list-group list-group-flush'>
        <?php foreach($books as $book):?>
            <li class='list-group-item'><?=$book['name']?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php require '../views/partials/_footer.view.php'?>