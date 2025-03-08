<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <h3>Hello</h3>
    <x-alert text="This is a custom alert message 'да'" style="color: red; border: 1px solid green;" />
    <x-forms.input />
    <x-forms.form-select />
    <x-forms.button style="padding: 10px; background: red;" class="my-class" />
    <x-forms.button>
        Slot Sağolsun
    </x-forms.button>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <x-forms.card>
                    <x-slot name="image">
                        <img src="https://cdn.marvel.com/content/1x/349red_com_mas_dsk_01.png" class="card-img-top" alt="Card Image">
                    </x-slot>
                    <x-slot name="title">
                        Red Hulk
                    </x-slot>
                </x-forms.card>
            </div>
            <div class="col-md-6">
                <x-forms.card>
                    <x-slot name="image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNExPqzlncbprg2iOlXL3Z6oIvdslSKYYU4Q&s" class="card-img-top" alt="Card Image">
                    </x-slot>
                    <x-slot name="title">
                        Captain Clown
                    </x-slot>
                </x-forms.card>
            </div>
        </div>
    </div>
</body>
</html>