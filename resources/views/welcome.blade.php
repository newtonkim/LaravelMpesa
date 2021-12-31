<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Daraja</title>
</head>

<body>
    <div class="container">

        <div class="row mt-5">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Obtain Access Token
                    </div>
                    <div class="card-body">
                        <h4 id="access_token"></h4>
                        <button id="getAccessToken" class="btn btn-primary">Request Access Token</button>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        Register URL
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary">Register URLs</button>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">Simulate Transactions</div>
                    <div class="card-body">
                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount"  class="form-control" id="amount">
                            </div>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" name="account"  class="form-control" id="account">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    document.getElementById('getAccessToken').addEventListener('click', (event) => {
        event.preventDefault()

    axios.post('/get-token', {})
    .then((response) => {
        console.log(response.data);
        document.getElementById('access_token').innerHTML = response.data.access_token
    })
    .catch((error) => {
        console.log(error);
    })
    })
</script>
</body>

</html>
