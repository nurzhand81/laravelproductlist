<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление товара</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>                            
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header" style="padding-left:20px;padding-top:10px">
                             Добавить товар
                        </div> 
                        <div class="card-body">
                            @if(Session::has('product_added'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('product_added')}} 
                                </div>
                            @endif
                            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Наименование</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="name">Артикул</label>
                                    <input type="text" name="productcode" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="file">Выбрать картинку товара</label>
                                    <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                                    <img id="previewImg" alt="Просмотр картинки товара" style="max-width:130px;margin-top:20px">
                                </div>

                                <button type="submit" class="btn btn-primary">Добавить</button>

                                <a class="btn btn-primary"  href="{{ route('products.all') }}" role="button">К списку товаров</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script>
        function previewFile(input)
        {
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function()
                {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>