<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Boxes</li>
            </ol>
        </nav>
        <table id="ingredientsTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ingredients</th>
                    <th scope="col">Delivery Date</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($boxes as $box)
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>
                    @foreach($box->boxrecipes  as $boxrecipe)
                        @foreach($boxrecipe->recipes  as $recipe)
                            @foreach($recipe->RecipeIngredients  as $recipeIngredient)
                                {{ $recipeIngredient->amount }} -
                                @foreach($recipeIngredient->ingredients  as $ingredient)
                                    {{ $ingredient->name }};
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                    </td>
                    <td>{{ $box->delivery_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $boxes->links() }}
        
    </div>
</body>
</html>
                    