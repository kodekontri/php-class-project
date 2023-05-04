<?php require '../views/partials/_head.view.php'?>
<?php require '../views/partials/_nav.view.php'?>
<div class="container">
    <header class='d-flex justify-content-between align-items-center py-4'>
        <h4>List of Books</h4>
        <a class='btn btn-sm btn-dark' href='/books/create'>Create New Book</a>
    </header>
    <form class='d-flex gap-2'>
        <select name="filter" class='form-control'>
            <option disabled selected>Filter By</option>
            <option value="name">Name</option>
            <option value="author">Author</option>
        </select>
        <input type='text' name='query' class='form-control' placeholder="Enter Query"/>
        <button class='btn btn-sm btn-primary'>Filter</button>
    </form>
    <ul class='list-group list-group-flush'>
        <?php foreach($books as $book):?>
            <li class='list-group-item'><?=$book['name']?> - <?=$book['author']?> <small><?=$book['year']?> </small> </li>
        <?php endforeach ?>
    </ul>
</div>
<?php require '../views/partials/_footer.view.php'?>