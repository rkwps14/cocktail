<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cocktail Recipe Portal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
        <h1 class="text-center">The Cocktail List</h1>
        <a href="javascript:void(0)" id="logout" class="text-right">Logout</a>
        <table class="table align-middle mt-5 mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                <th>Drink Name</th>
                <th>Category</th>
                <th>Glass</th>
                <th>Instruction</th>
                </tr>
            </thead>
            <tbody id="drinkList">

            </tbody>
            </table>

        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        let session = sessionStorage.getItem('user');

        if(session == null){
            window.location = "/";
        }

        let param = new window.URLSearchParams(window.location.search);
        id = param.get('id');
        let url = "";
            if(param == ''){
                url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
            }else{
                url = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i="+id;
            }

        $.ajax({
            type: "GET",
            url: url,
            success: function(response){
                // let records = response.drinks;

                $.each(response.drinks, function(key,val) {

                    let tdata = `<tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="${val.strDrinkThumb}"
                                                class="rounded-circle"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                />
                                            <div class="ms-3">
                                                <a href="${window.location+'?id='+val.idDrink}"><p class="fw-bold mb-1">${val.strDrink}</p></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">${val.strCategory}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">${val.strGlass}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">${val.strInstructions}</p>
                                    </td>
                                </tr>`;

                                $('#drinkList').append(tdata);
                });


                //if request if made successfully then the response represent the data


            }
        });
    });

    // $('#loginBtn').click(function(){
    //     let email = $('#email').val();
    //     let password = $('#password').val();

    //     let url = "api/loginUser";
    //     let data = { "email" : email, "password": password };

    //     $.ajax({
    //     type: "POST",
    //     url: url,
    //     data: data,
    //     success: function(response){
    //         if(response.status == 200){
    //             window.location = 'listing';
    //         }
    //         //if request if made successfully then the response represent the data


    //     }
    //     });
    // });

    // $('#createNew').click(function(){
    //     window.location = 'register';
    // });
    $('#logout').click(function(){
        sessionStorage.removeItem('user');
        location.reload();
    });
</script>
</html>
