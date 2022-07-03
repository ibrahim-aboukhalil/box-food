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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="badge bg-warning me-3">POST</span>Create Ingredients
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="{{ route('ingredientcreate') }}">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input id="ingredient_name" name="ingredient_name" type="text" class="form-control" placeholder="Tomatoes" required>
                                        <label for="floatingInput">Ingredient Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <select id="measure" name="measure" class="form-select form-select-lg pb-3" aria-label="Default select example" required>
                                        <option selected value="">Measure</option>
                                        <option value="g">g(Grams)</option>
                                        <option value="kg">Kg(Kilograms)</option>
                                        <option value="pieces">Pieces</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input id="supplier" name="supplier" type="text" class="form-control" placeholder="John Snow" required>
                                        <label for="floatingInput">Supplier Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                            @if (session('ingredient'))
                            <div class="alert alert-primary mt-3" role="alert">
                                <b>Response: </b>{{ Session::get('ingredient') }}
                            </div>
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div id="ingredientToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                    <strong class="me-auto">Success</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                    Ingredient was created successfully
                                    </div>
                                </div>
                            </div>
                            <script>
                            const toastLiveIngredient = document.getElementById('ingredientToast');
                            const toastIngredient = new bootstrap.Toast(toastLiveIngredient);
                            toastIngredient.show();
                            </script>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="badge bg-success me-3">GET</span>List All Ingredients
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <button type="button" class="btn btn-primary" id="GetIngredients">Get All Ingredients</button>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="badge bg-warning me-3">POST</span>Create Recipe
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="{{ route('recipecreate') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input id="recipe_name" name="recipe_name" type="text" class="form-control" placeholder="Polo Pasta" required>
                                        <label>Recipe Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea id="recipe_description" name="recipe_description" class="form-control" rows="3" placeholder="Description goes here" required></textarea>
                                        <label>Description</label>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-2">
                                    <div class="form-floating">
                                        <input id="amount" name="amount" type="number" class="form-control" placeholder="Enter Amount">
                                        <label>Amount</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <input class="form-control form-control-lg" list="datalistOptions" id="ingredientsDataList" name="ingredientsDataList" placeholder="Type to search ingredients...">
                                    <datalist id="datalistOptions">
                                        @foreach($ingredients as $ingredient)
                                            <option value="{{ $ingredient->name }}" data-id="{{ $ingredient->id }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-secondary btn-lg" id="submit_ingredient">Add</button>
                                </div>
                                <div class="col">
                                    <textarea id="recipe_ingredients" name="recipe_ingredients" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                            @if (session('recipe'))
                            <div class="alert alert-primary mt-3" role="alert">
                                <b>Response: </b>{{ Session::get('recipe') }}
                            </div>
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div id="recipeToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                    <strong class="me-auto">Success</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                    Recipe was created successfully
                                    </div>
                                </div>
                            </div>
                            <script>
                            const toastLiveRecipe = document.getElementById('recipeToast');
                            const toastRecipe = new bootstrap.Toast(toastLiveRecipe);
                            toastRecipe.show();
                            </script>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span class="badge bg-success me-3">GET</span>List All Recipes
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <button type="button" class="btn btn-primary" id="GetRecipes">Get All Recipes</button>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span class="badge bg-warning me-3">POST</span>Create Box
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post" action="{{ route('boxcreate') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input id="delivery_date" name="delivery_date" type="text" class="form-control" placeholder="DD-MM-YYYY" required>
                                        <label>Delivery date(DD-MM-YYYY)</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <select class="recipes" name="recipes[]" id="recipes" multiple="multiple" style="width: 100%">
                                        @foreach($recipes as $recipe)
                                            <option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
                                        @endforeach
                                        <option value="33">test</option>
                                    </select>
                                </div>                                
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                            @if (session('box'))
                            <div class="alert alert-primary mt-3" role="alert">
                                <b>Response: </b>{{ Session::get('box') }}
                            </div>
                            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                <div id="boxToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                    <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                    <strong class="me-auto">Success</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                    Box was created successfully
                                    </div>
                                </div>
                            </div>
                            <script>
                            const toastLiveBox = document.getElementById('boxToast');
                            const toastBox = new bootstrap.Toast(toastLiveBox);
                            toastBox.show();
                            </script>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <span class="badge bg-success me-3">GET</span>List All Boxes
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="get" action="{{ route('allBoxes') }}">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input id="order_date" name="order_date" type="text" class="form-control" placeholder="DD-MM-YYYY" required>
                                        <label>Order date(DD-MM-YYYY)</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" id="GetBoxes">Get All Boxes</button>
                                </div>
                            </div>
                            @if (session('boxes'))
                                <div class="alert alert-primary mt-3" role="alert">
                                    <b>Response: </b>{{ Session::get('boxes') }}
                                </div>
                                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                    <div id="boxToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                        <strong class="me-auto">Success</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                        Box was created successfully
                                        </div>
                                    </div>
                                </div>
                                <script>
                                const toastLiveBox = document.getElementById('boxToast');
                                const toastBox = new bootstrap.Toast(toastLiveBox);
                                toastBox.show();
                                </script>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.recipes').select2({
            theme: "classic",
            placeholder: "Please choose up to 4 Recipes",
            maximumSelectionLength: 4
        });
    });
    $('#GetIngredients').click(function(){
        location.href = '{{ route('allIngredients') }}';
    });
    $('#GetRecipes').click(function(){
        location.href = '{{ route('allRecipes') }}';
    });
    $('#submit_ingredient').click(function(){
        var recipe_ingredients = "";
        var recipe_ingredients_array = [];
        var amount = $('#amount').val();
        var ingredient = $('#ingredientsDataList').val();
        var ingredientId = $("#datalistOptions option[value='" + ingredient + "']").attr('data-id');
        var previous_ingredients = $('#recipe_ingredients').text();
        recipe_ingredients = '{"amount":'+amount+',"ingredient":"'+ingredient+'", "ingredient_id":'+ingredientId+'},';
        recipe_ingredients_array.push(recipe_ingredients);
        $('#recipe_ingredients').text(previous_ingredients+recipe_ingredients_array);
        $('#amount').val('');
        $('#ingredientsDataList').val('');
    });
</script>
</html>